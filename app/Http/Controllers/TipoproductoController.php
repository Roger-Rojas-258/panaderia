<?php

namespace App\Http\Controllers;

use App\Models\Tipoproducto;
use Illuminate\Http\Request;

class TipoproductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = Tipoproducto::all();
        return view('tipoproductos.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('/tipoproductos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $tipo = new Tipoproducto();
        $tipo->nombre =  $request->post('nombre');
        $tipo->save();
        return redirect()->route('tipoproducto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipoproducto $tipoproducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tipo = Tipoproducto::find($id);
        return view('tipoproductos.edit', compact('tipo'));
        /*$producto = Producto::find($id);
        $categorias = Categoria::all();
        return view('productos.edit', ['producto' => $producto], ['categorias' => $categorias]); */
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tipo = Tipoproducto::find($id);
        $tipo->nombre =  $request->post('nombre');
        $tipo->save();
        return redirect()->route('tipoproducto.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tipo = Tipoproducto::find($id);
        $tipo->delete();

        return redirect()->route('tipoproducto.index');
    }
}