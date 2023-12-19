<?php

namespace App\Http\Controllers;

use App\Models\Privilegio;
use Illuminate\Http\Request;

class PrivilegioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = Privilegio::where('estado', 1)->get();
        return view('privilegios.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/privilegios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipo = new Privilegio();
        $tipo->descripcion =  $request->post('descripcion');
        $tipo->save();
        return redirect()->route('privilegio.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Privilegio $privilegio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tipo = Privilegio::find($id);
        return view('privilegios.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tipo = Privilegio::find($id);
        $tipo->descripcion =  $request->post('descripcion');
        $tipo->save();
        return redirect()->route('privilegio.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tipo = Privilegio::find($id);
        //$tipo->delete();
        if ($tipo) {
            $tipo->update(['estado' => 0]);
        }

        return redirect()->route('privilegio.index');
    }
    
    public function eliminados(){
        $tipos = Privilegio::where('estado', 0)->get();
        return view('privilegios.eliminados', compact('tipos'));
    }


    public function cambiarEstado($tipoId)
    {
    $tipo = Privilegio::find($tipoId);

    if ($tipo) {
        $tipo->update(['estado' => 1]);
    }

    return redirect()->route('privilegio.index');
    }
}