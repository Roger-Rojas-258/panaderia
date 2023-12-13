<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Detallepedido;
use App\Models\Notapedido;
use App\Models\Ofertadia;
use App\Models\Producto;
use App\Models\Productooferta;
use App\Models\Tipopago;
use App\Models\Tipoproducto;
use Carbon\Carbon;
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
    public function guardarPedido(Request $request){
        $datos = $request->json()->all();
    if (!empty($datos)) {
        $pedido = new Notapedido();
        /*fecha	total_precio	costo_envio	tiempo_estimado	estado_entrega	id_cliente	id_ubicacion	id_repartidorvehiculo	id_pago */
        $fechaActual = Carbon::now();
        $fechaActual = $fechaActual->format('Y-m-d');
        
        $pedido->fecha = $fechaActual;
        $pedido->total_precio = $datos['total_precio'];
        $pedido->costo_envio = $datos['costo_envio'];
        $pedido->estado_entrega = $datos['estado_entrega'];
        $pedido->tiempo_estimado = $datos['id_cliente'];
        $pedido->id_cliente = $datos['id_cliente'];
        $pedido->id_ubicacion = $datos['id_ubicacion'];
        $pedido->id_repartidorvehiculo = $datos['id_repartidor'];
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
            //}
        }

        return response()->json([
            'mensaje' => 'Datos recibidos y procesados correctamente',
            'status' => 200
        ]);
        } else {
        return response()->json(['mensaje' => 'No se recibieron datos'], 400);
        }
        return redirect()->route('venta.list');
    }
}