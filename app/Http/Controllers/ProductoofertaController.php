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
        return session('Rol');
        $fechaActual = Carbon::now();
        $fechaSolo = $fechaActual->toDateString();

        $ofertaDia = Ofertadia::where('fecha', $fechaSolo)->first();
        $productos = $ofertaDia ? $ofertaDia->productos : [];
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
        $i = 0;
        do {
            $fechaActual = $fechaActual->subDay();
            //return [$fechaActual->toDateString(), '----', $fechaActual->subDay()->toDateString(),];
            $ofertaAyer = Ofertadia::where('fecha', $fechaActual->toDateString())->orderBy('id_oferta', 'desc')->first();
            $i++;
        } while (!$ofertaAyer && $i < 50);

        $productosAyer = $ofertaAyer ? $ofertaAyer->productos : [];
        $productos = Producto::all();
        return view('/productosofertas.create', compact('productos', 'productosAyer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $respuesta = true;
        $datos = $request->input('datos');
        $fechaActual = Carbon::now();
        if (!(Ofertadia::where('fecha', $fechaActual->toDateString())->orderBy('id_oferta', 'desc')->first())) {
            $ofertadia = new Ofertadia();
            $ofertadia->fecha = $fechaActual->toDateString();
            $ofertadia->save();
            foreach ($datos as $dato) {
                $productooferta = new Productooferta();
                $productooferta->id_oferta = $ofertadia->id_oferta;
                $productooferta->id_producto = $dato['id_producto'];
                $productooferta->stock = $dato['stock'] < 0 ? 0 : $dato['stock'];
                $productooferta->save();
            }
        } else {
            $respuesta = false;
        }
        return response()->json(['success' => $respuesta]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Productooferta $productooferta)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $id_oferta)
    {
        $reg = Producto::find($id);
        $producto = $reg->ofertadias;
        $productos = Producto::where('estado', 1)->get();
        return view('productosofertas.edit', compact('producto', 'productos', 'id_oferta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id, $id_oferta)
    {
        $productooferta = Productooferta::where('id_producto', $id)->where('id_oferta', $id_oferta)->first();
        $nuevoProducto = Producto::find($request->post('nombre'));

        $productooferta->id_producto = $nuevoProducto->id_producto;

        $productooferta->stock =  $request->post('stock');
        $productooferta->save();
        return redirect()->route('productosoferta.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Productooferta $productooferta)
    {
        //
    }
}
