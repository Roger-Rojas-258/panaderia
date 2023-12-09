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
        //
        $producto = new Producto();
        $producto->nombre = $request->post('nombre');
        $producto->precio = $request->post('precio');
        $producto->id_tipo = $request->post('id_tipo');
        $producto->save();
        return redirect()->route('producto.index');
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