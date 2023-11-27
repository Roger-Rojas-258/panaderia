<?php

namespace App\Http\Controllers;

use App\Models\Tipovehiculo;
use Illuminate\Http\Request;

class TipovehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = Tipovehiculo::where('estado', 1)->get();
        return view('tipovehiculos.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/tipovehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipo = new Tipovehiculo();
        $tipo->descripcion =  $request->post('descripcion');
        $tipo->save();
        return redirect()->route('tipovehiculo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipovehiculo $tipovehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tipo = Tipovehiculo::find($id);
        return view('tipovehiculos.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tipo = Tipovehiculo::find($id);
        $tipo->nombre =  $request->post('descripcion');
        $tipo->save();
        return redirect()->route('tipovehiculo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tipo = Tipovehiculo::find($id);
        //$tipo->delete();
        if ($tipo) {
            $tipo->update(['estado' => 0]);
        }

        return redirect()->route('tipovehiculo.index');
    }

    public function eliminados(){
        $tipos = Tipovehiculo::where('estado', 0)->get();
        return view('tipovehiculos.eliminados', compact('tipos'));
    }


    public function cambiarEstado($tipoId)
    {
    $tipo = Tipovehiculo::find($tipoId);

    if ($tipo) {
        $tipo->update(['estado' => 1]);
    }

    return redirect()->route('tipovehiculo.index');
    }
}