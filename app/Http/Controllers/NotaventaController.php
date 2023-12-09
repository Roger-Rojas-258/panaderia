<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Notaventa;
use App\Models\Ofertadia;
use App\Models\Producto;
use App\Models\Productooferta;
use App\Models\Tipopago;
use App\Models\Tipoproducto;
use Illuminate\Http\Request;

class NotaventaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::where('estado', 1)->get();
        $categorias = Tipoproducto::all();
        $clientes = Cliente::where('estado',1)->get();
        $pagos = Tipopago::where('estado',1)->get();
        $tipos = Tipopago::where('estado', 1)->get();
        // trarer todos loa productos que esten en producto venta
        $productoVentas = Productooferta::all();
        return view('ventas.index', compact('productos','clientes','pagos','categorias','productoVentas','tipos'));
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
    public function show(Notaventa $notaventa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notaventa $notaventa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notaventa $notaventa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notaventa $notaventa)
    {
        //
    }
    public function guardarVenta(Request $request){
        return response()->json([
        'mensaje' => 'Datos recibidos y procesados correctamente',
        'status' => 200
    ]);
    /*$datosJson = $request->getContent();
    $datos = json_decode($datosJson, true);
    //guadar venta luego los detalle
    if (!empty($datos)) {
        //guadar en venta 
        $venta = new Notaventa();
        $venta->fecha = $datos['fecha'];
        $venta->fecha = $datos['total_precio'];
        $venta->fecha = $datos['id_cliente'];
        $venta->fecha = 1;// aqui lo vamos a cambiar caundo se autentifique
        $venta->id_pago= $datos['id_pago'];
        foreach ($datos as $dato) {
            //guadar en detalle venta
            $producto = new Productooferta();
            $producto->id_producto = $dato['id_producto'];
            $producto->id_oferta = Ofertadia::max('id_oferta');
            $producto->stock = $dato['stock'];
            $producto->save();
        }

        // Devolver una respuesta
        return response()->json([
            'mensaje' => 'Datos recibidos y procesados correctamente',
            'status' => 200
        ]);
    } else {
        // Devolver una respuesta en caso de que no haya datos
        return response()->json(['mensaje' => 'No se recibieron datos'], 400);
    }*/

    }
}