<?php

namespace App\Http\Controllers;

use App\Models\Ofertadia;
use App\Models\Producto;
use App\Models\Productooferta;
use App\Models\Tipoproducto;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ProductoofertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fechaActual = Carbon::now();
        $fechaSolo = $fechaActual->toDateString();
        $ofertaDia = Ofertadia::where('fecha', $fechaSolo)->first();
        $productos = $ofertaDia->productos;
        $tiposProductos = Tipoproducto::all();
        //return $productos[0]->pivot->id_oferta;
        return view('productosofertas.index', compact('productos', 'ofertaDia', 'tiposProductos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fechaActual = Carbon::now();

        do {
            $fechaActual = $fechaActual->subDay();
            $ofertaAyer = Ofertadia::where('fecha', $fechaActual->toDateString())->first();
        } while (!$ofertaAyer);
        //return $ofertaAyer;
        $productosAyer = $ofertaAyer->productos;
        $productos = Producto::all();

        //return [$productosAyer, '-----------------------------', $productos];

        return view('/productosofertas.create', compact('productos', 'productosAyer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productooferta = new Productooferta;
        $productosSeleccionados = $request->input('productos_seleccionados', []);
        return redirect()->route('nombre_de_tu_ruta');
    }

    /**
     * Display the specified resource.
     */
    public function show(Productooferta $productooferta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Productooferta $productooferta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Productooferta $productooferta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Productooferta $productooferta)
    {
        //
    }

    public function guadarDatos(Request $request)
    {
        // Obtener los datos del cuerpo de la solicitud y decodificar el JSON
        // return "exito";
        $datosJson = $request->getContent();
        $datos = json_decode($datosJson, true);

        if (!empty($datos)) {
            foreach ($datos as $dato) {
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
        }
    }

    /*public function guadarDatos(){
    // Obtener los datos del cuerpo de la solicitud y decodificar el JSON
    $datosJson = file_get_contents('php://input');
    $datos = json_decode($datosJson, true);

    if (!empty($datos)) {
        foreach ($datos as $dato) {
            $producto = new Productooferta();
            $producto->id_producto = $dato['id_producto'];
            $producto->id_oferta = Ofertadia::max('id_oferta');
            $producto->id_productooferta = 4;
            $producto->stock = $dato['stock'];
            $producto->save();
        }

        // Devolver una respuesta
        header('Content-Type: application/json');
        echo json_encode(['mensaje' => 'Datos recibidos y procesados correctamente']);
    } else {
        // Devolver una respuesta en caso de que no haya datos
        header('Content-Type: application/json');
        echo json_encode(['mensaje' => 'No se recibieron datos']);
    }
}*/
}
