<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Detallepedido;
use App\Models\Notapedido;
use App\Models\Notaventa;
use App\Models\Ofertadia;
use App\Models\Producto;
use App\Models\Productooferta;
use App\Models\Repartidor;
use App\Models\Repartidorvehiculo;
use App\Models\Tipopago;
use App\Models\Tipoproducto;
use App\Models\Ubicacion;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;


class NotapedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $fechaActual = Carbon::now()->toDateString();
        // $ofertaDia = Ofertadia::where('fecha', $fechaActual)->orderBy('id_oferta', 'desc')->first();
        // $productoofertas = Productooferta::where('id_oferta', $ofertaDia->id_oferta)->get();
        // $productos = Producto::where('estado', 1)->get();

        // return view('carrito', compact('productos', 'productoofertas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Notapedido $notapedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notapedido $notapedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notapedido $notapedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notapedido $notapedido)
    {
        //
    }
    public function guardarPedido(Request $request)
    {
        $datos = $request->input('datos');
        try {

            // $datos = $request->json()->all();

            if (!empty($datos)) {

                $fechaActual = Carbon::now();
                $idLogeado = 0;
                // if (Auth()->user()->id_cliente) {
                //     $idLogeado = Auth()->user()->id_cliente;
                // } else if (Auth()->user()->id_empleado) {
                //     $idLogeado = Auth()->user()->id_empleado;
                // } else if (Auth()->user()->id_repartidor) {
                //     $idLogeado = Auth()->user()->id_repartidor;
                // }

                $ubicacion = new Ubicacion();
                $ubicacion->longitud = $datos['ubicacion']['longitud'];
                $ubicacion->latitud = $datos['ubicacion']['latitud'];
                $ubicacion->referencia = $datos['ubicacion']['referencia'];
                $ubicacion->descripcion = $datos['ubicacion']['descripcion'];
                $ubicacion->save(); //

                //     pedido------------------------------------
                $pedido = new Notapedido();
                $pedido->fecha = $fechaActual;
                $pedido->total_precio = $datos['total_precio'];
                $pedido->costo_envio = $datos['costo_envio'];
                $pedido->estado_entrega = $datos['estado_entrega'];
                $pedido->tiempo_estimado = 5;
                $pedido->id_cliente = 1;
                $pedido->id_ubicacion = $ubicacion->id_ubicacion;
                $pedido->id_repartidorvehiculo = 1;
                $pedido->id_pago = $datos['id_pago'];
                $pedido->save();

                // Extraer información de venta
                $id_pedido = $pedido->id_pedido;

                // Guardar en detalle venta
                foreach ($datos['productos'] as $dato) {
                    //if (isset($dato['id_productooferta'])) {
                    $detallepedido = new Detallepedido();
                    $detallepedido->cantidad = $dato['cantidad'];
                    $detallepedido->sub_total = $dato['subtotal'];
                    $detallepedido->id_productooferta = $dato['productooferta'];
                    $detallepedido->id_pedido = $id_pedido;
                    $detallepedido->save();

                    $productooferta = Productooferta::find($dato['productooferta']);
                    $productooferta->stock = $productooferta->stock - $dato['cantidad'];
                    $productooferta->save();
                }

                return response()->json(['success' => 'Guardado correctamente...']);
            } else {
                return response()->json(['mensaje' => 'No se recibieron datos'], 400);
            }
            // } else {
            //     return response()->json(['success' => 'No se inicio sesión' . Auth::check()]);
            // }
        } catch (QueryException | ModelNotFoundException $e) {
            $response = [
                'message' => 'Error en la BD al guardar el registro.',
                'status' => 500,
                'error' => $e
            ];
        } catch (\Exception $e) {
            $response = [
                'message' => 'Error general al guardar el registro.',
                'status' => 500,
                'error' => $e
            ];

            return $response;
        }
        return $response;
    }

    //devolver solo los pedidos que esteen en estado pendiente
    public function Pendiente()
    {
        $pedidos = Notapedido::where('estado_entrega', 'PENDIENTE')->get();
        $clientes = Cliente::all();
        $ubicaciones = Ubicacion::all();
        $pagos = Tipopago::where('estado', 1)->get();
        $repartidores = Repartidor::where('estado', 1)->get();
        return view('pedidos.porentregar', compact('pedidos', 'clientes', 'ubicaciones', 'pagos', 'repartidores'));
    }
    //ESTO SE ASIGANRA CUANDO EL REPARTIDOR APRETE A OPCION ENTREGADO EN SU VISTA

    public function Entregado()
    {
        $pedidos = Notapedido::where('estado_entrega', 'ENTREGADO')->get();
        $clientes = Cliente::all();
        $ubicaciones = Ubicacion::all();
        $pagos = Tipopago::where('estado', 1)->get();
        $repartidoresvehiculo = Repartidorvehiculo::all();
        $repartidores = Repartidor::where('estado', 1)->get();
        return view('pedidos.entregado', compact('pedidos', 'clientes', 'ubicaciones', 'pagos', 'repartidores', 'repartidoresvehiculo'));
    }

    //funcion asignarRepartidor
    public function asignarRepartidor(Request $request)
    {
        $datos = $request->json()->all();
        if (!empty($datos)) {
            $pedido = Notapedido::find($datos['id_nota']);
            $pedido->id_repartidorvehiculo = $datos['id_repartidor'];
            $pedido->estado_entrega = "POR ENTREGAR";
            $pedido->save();
            return redirect()->route('pedidos.pendiente');
        } else {
            dd("No ingreso");
        }
    }
    public function repartidorAsignado()
    {
        $pedidos = Notapedido::where('estado_entrega', 'POR ENTREGAR')->get();
        $clientes = Cliente::all();
        $ubicaciones = Ubicacion::all();
        $pagos = Tipopago::where('estado', 1)->get();
        $repartidoresvehiculo = Repartidorvehiculo::all();
        $repartidores = Repartidor::where('estado', 1)->get();
        return view('pedidos.repartidorasignado', compact('pedidos', 'clientes', 'ubicaciones', 'pagos', 'repartidores', 'repartidoresvehiculo'));
    }

    public function detallePedido($id)
    {
        //$datos = $request->all(); // Cambiar a $request->all()
        //$id_pedido = $datos['id_pedido'];
        // traer los detalle de venta las ventas los clientes repartidores ubicacion tipo de pago vehiculo
        $pedidos = Notapedido::where('id_pedido', $id);
        $detallepedidos = Detallepedido::all(); //porque puede haber mas de 1 detalle por venta 
        $ubicaciones = Ubicacion::all();
        $clientes = Cliente::all();
        $repartidores = Repartidor::all();
        $repartidoresvehiculo = Repartidorvehiculo::all();
        $pagos = Tipopago::all();
        return view('pedidos.detalle', compact('pedidos', 'clientes', 'ubicaciones', 'pagos', 'repartidores', 'repartidoresvehiculo'));
    }

    //Empezamos con el pdf
    public function pdf($id)
    {
        $pedidos = Notapedido::find($id);
        $detallepedidos = Detallepedido::where('id_pedido', $id)->get();
        $productoofertas = Productooferta::all();
        $productos = Producto::all();

        // Convertir los datos a un array asociativo
        $data = [
            'pedidos' => $pedidos,
            'detallepedidos' => $detallepedidos,
            'productoofertas' => $productoofertas,
            'productos' => $productos,
        ];

        // Pasar el array a loadView
        $pdf = Pdf::loadView('pedidos.pdf', $data);

        return $pdf->stream();
    }
}
