<?php

namespace App\Http\Controllers;

use App\Models\Ofertadia;
use App\Models\Producto;
use App\Models\Productooferta;
use App\Models\Tipoproducto;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductoofertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        /*$ultimaFecha = Ofertadia::max('fecha');
        $ultimaFecha;
        $fechaActual = Carbon::now();
        $fechaActual = $fechaActual->format('Y-m-d');

        if ($fechaActual > $ultimaFecha) {
            // Creamos la oferta del día
            Ofertadia::create(['fecha' => $fechaActual]);

            // Redireccionamos a la vista de creación
            return redirect()->route('productosoferta.create');
        } else{
            //primero traeremos el max de los id eso significa la ultima fecha
            // luego preguntaremos que si id_oferta de  $productosofertas es menor que ofertadia y despues traer los productos
            //$ofertadias = Ofertadia::all();
            //$productosofertas = Productooferta::all();
            //$productos = Producto::where('estado', 1)->get();
            
            $id_ofertadias = Ofertadia::max('id_oferta');
            $id_productosofertas = Productooferta::max('id_oferta');
            if($id_ofertadias>$id_productosofertas){
                $ofertadias = Ofertadia::all();
                $productosofertas = Productooferta::all();
                $productos = Producto::where('estado', 1)->get();
                return view('productosofertas.index', compact('productosofertas', 'productos', 'ofertadias'));
            } else{
                
            }

        }*/
        $productos = Producto::where('estado', 1)->get();
        $productosofertas = Productooferta::all();
        $ofertadias = Ofertadia::all();
        $tipos = Tipoproducto::where('estado',1)->get();
        //pienso traer los datos de la base de datos y compararlos si estan en productoofertadia significa que estan a la venta
        return view('productosofertas.index', compact('productosofertas', 'productos','ofertadias','tipos'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = Producto::all();
        $productosofertas = Productooferta::all();
        return view('/productosofertas.create', compact('productos','productosofertas'));
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
    
    public function guadarDatos(Request $request){
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