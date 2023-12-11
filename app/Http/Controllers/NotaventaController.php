<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Detalleventa;
use App\Models\Empleado;
use App\Models\Notaventa;
use App\Models\Ofertadia;
use App\Models\Producto;
use App\Models\Productooferta;
use App\Models\Tipopago;
use App\Models\Tipoproducto;
use Carbon\Carbon;
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
    public function auxiliar(){
        $notaventas = Notaventa::all();
        $empleados = Empleado::all();
        $clientes = Cliente::all();
        $tipos= Tipopago::all();
        return view('ventas.list', compact('notaventas','empleados','clientes','tipos'));
    }
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
    
    public function guardarVenta(Request $request) {
    $datos = $request->json()->all();
    if (!empty($datos)) {
        // Guardar en venta
        $venta = new Notaventa();

        $fechaActual = Carbon::now();
        $fechaActual = $fechaActual->format('Y-m-d');
        
        $venta->fecha = $fechaActual;
        $venta->total_precio = $datos['total'];
        $venta->id_cliente = $datos['id_cliente'];
        $venta->id_empleado = 1; // Cambiar cuando se autentifique
        $venta->id_pago = $datos['id_pago'];
        $venta->save();

        // Extraer información de venta
        $id_venta = $venta->id_venta;

        // Guardar en detalle venta
        foreach ($datos['productos'] as $dato) {
            //if (isset($dato['id_productooferta'])) {
                $detalleventa = new Detalleventa();
                $detalleventa->cantidad = $dato['cantidad'];
                $detalleventa->sub_total = $dato['subtotal'];
                $detalleventa->id_productooferta = $dato['productoOferta'];
                $detalleventa->id_venta = $id_venta;
                $detalleventa->save();
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