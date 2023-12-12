<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Tipoproducto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = Tipoproducto::where('estado', 1)->get();
        $productos = Producto::where('estado', 1)->get();
        return view('productos.index', compact('productos'),compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $productos= Producto::all();
        $tipos = Tipoproducto::all();
        return view('productos.create', compact('productos'),compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
        $producto = new Producto();
        $producto->nombre = $request->post('nombre');
        $producto->precio = $request->post('precio');
        //imagen
         $request->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $producto->imagen = $request->file('imagen');
        $nombreImagen = time() . '.' . $producto->imagen->getClientOriginalExtension();
        $ruta = public_path('imagen');
        $producto->imagen->move($ruta, $nombreImagen);

        $producto->id_tipo = $request->post('id_tipo');
        $producto->save();
        return redirect()->route('producto.index');*/
        // Validación de los campos del producto
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_tipo' => 'required|exists:tipos,id', // Ajusta según tu modelo y tabla de tipos
        ]);
        $producto = new Producto();
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');

    // Procesar y almacenar la imagen
        $imagen = $request->file('imagen');
        $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
        $ruta = public_path('imagen'); // Asegúrate de que esta sea la ruta correcta
        $imagen->move($ruta, $nombreImagen);
        $producto->imagen = $nombreImagen;

        $producto->id_tipo = $request->input('id_tipo');
        $producto->save(); // Guardar el producto en la base de datos

        return redirect()->route('producto.index')
                     ->with('success', 'Producto creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $productos = Producto::find($id);
        $tipos = Tipoproducto::all();
        return view('productos.edit', compact('productos'), compact('tipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $producto = Producto::find($id);
        $producto->nombre =  $request->post('nombre');
        $producto->precio =  $request->post('precio');
        $producto->id_tipo =  $request->post('id_tipo');
        $producto->save();
        return redirect()->route('producto.index');
        // Validación de los campos del producto
        // Validación de los campos del producto
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        if ($producto) {
            $producto->update(['estado' => 0]);
        }

        return redirect()->route('producto.index');
    }
    public function eliminados(){
        $tipos = Tipoproducto::all();
        $productos = Producto::where('estado', 0)->get();
        return view('productos.eliminados', compact('tipos'), compact('productos'));
    }


    public function cambiarEstado($tipoId)
    {
    $tipo = Producto::find($tipoId);

    if ($tipo) {
        $tipo->update(['estado' => 1]);
    }

    return redirect()->route('producto.index');
    }
}