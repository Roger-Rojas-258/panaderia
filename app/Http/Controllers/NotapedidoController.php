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

class NotapedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fechaActual = Carbon::now()->toDateString();
        $ofertaDia = Ofertadia::where('fecha', $fechaActual)->first();
        $productoofertas = Productooferta::where('id_oferta', $ofertaDia->id_oferta)->get();
        $productos = Producto::where('estado', 1)->get();

        return view('carrito', compact('productos', 'productoofertas'));
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
        try {
            session_start();
            if ($_SESSION['id_cliente']) {
                // dd($_SESSION['id_cliente']);
                $datos = $request->json()->all();

                if (!empty($datos)) {

                    $fechaActual = Carbon::now();
                    $fechaActual = $fechaActual->format('Y-m-d');

                    //dd($datos);

                    $ubicacion = new Ubicacion();
                    $ubicacion->longitud = $datos['ubicacion']['longitud'];
                    $ubicacion->latitud = $datos['ubicacion']['latitud'];
                    $ubicacion->referencia = $datos['ubicacion']['referencia'];
                    $ubicacion->descripcion = $datos['ubicacion']['descripcion'];
                    $ubicacion->save(); //

                    //-----
                    //     pedido------------------------------------
                    $pedido = new Notapedido();
                    $pedido->fecha = $fechaActual;
                    $pedido->total_precio = $datos['total_precio'];
                    $pedido->costo_envio = $datos['costo_envio'];
                    $pedido->estado_entrega = $datos['estado_entrega'];
                    $pedido->tiempo_estimado = 5;
                    $pedido->id_cliente = $_SESSION['id_cliente'];
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

                    //return response()->json(['redirect' => route('roles.index')]);

                    // return response()->json([
                    //     'mensaje' => 'Datos recibidos y procesados correctamente',
                    //     'status' => 200
                    // ]);
                } else {
                    return response()->json(['mensaje' => 'No se recibieron datos'], 400);
                }
            } else {
                dd('No inicio session');
            }
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
}
