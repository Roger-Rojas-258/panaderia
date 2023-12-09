<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipo = Rol::where('estado', 1)->get();
        return view('roles.index', compact('tipo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipo = new Rol();
        $tipo->nombre =  $request->post('nombre');
        $tipo->descripcion =  $request->post('descripcion');
        $tipo->save();
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tipo = Rol::find($id);
        return view('roles.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tipo = Rol::find($id);
        $tipo->nombre =  $request->post('nombre');
        $tipo->descripcion =  $request->post('descripcion');
        $tipo->save();
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipo = Rol::find($id);
        //$tipo->delete();
        if ($tipo) {
            $tipo->update(['estado' => 0]);
        }

        return redirect()->route('roles.index');
    }

    public function eliminados()
    {
        $tipos = Rol::where('estado', 0)->get();
        return view('roles.eliminados', compact('tipos'));
    }


     public function cambiarEstado($tipoId)
    {
    $tipo = Rol::find($tipoId);

    if ($tipo) {
        $tipo->update(['estado' => 1]);
    }

    return redirect()->route('privilegio.index');
    }
}