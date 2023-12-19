<?php

namespace App\Http\Controllers;

use App\Models\Repartidor;
use Illuminate\Http\Request;

class RepartidorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = Repartidor::where('estado', 1)->get();
        return view('repartidor.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/repartidor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipo = new Repartidor();
        $tipo->ci =  $request->post('ci');
        $tipo->nombre =  $request->post('nombre');
        $tipo->paterno =  $request->post('paterno');
        $tipo->materno =  $request->post('materno');
        $tipo->fecha_nacimiento =  $request->post('fecha_nacimiento');
        $tipo->total_propina = $request->post('total_propina');
        $tipo->sexo =  $request->post('sexo');
        $tipo->telefono =  $request->post('telefono');
        $tipo->save();
        //crear usuario
        return redirect()->route('repartidor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $tipo = Repartidor::find($id);
        return view('repartidor.edit', compact('tipo'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tipo = Repartidor::find($id);
        $tipo->ci =  $request->post('ci');
        $tipo->nombre =  $request->post('nombre');
        $tipo->paterno =  $request->post('paterno');
        $tipo->materno =  $request->post('materno');
        $tipo->fecha_nacimiento =  $request->post('fecha_nacimiento');
        $tipo->total_propina = $request->post('total_propina');
        $tipo->sexo =  $request->post('sexo');
        $tipo->telefono =  $request->post('telefono');
        $tipo->save();
        return redirect()->route('repartidor.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tipo = Repartidor::find($id);
        //$tipo->delete();
        if ($tipo) {
            $tipo->update(['estado' => 0]);
        }

        return redirect()->route('repartidor.index');
    }
    public function eliminados(){
        $tipos = Repartidor::where('estado', 0)->get();
        return view('repartidor.eliminados', compact('tipos'));
    }


    public function cambiarEstado($tipoId)
    {
    $tipo = Repartidor::find($tipoId);

    if ($tipo) {
        $tipo->update(['estado' => 1]);
    }

    return redirect()->route('repartidor.index');
    }
}