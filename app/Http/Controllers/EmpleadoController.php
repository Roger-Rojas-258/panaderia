<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = Empleado::where('estado', 1)->get();
        return view('empleados.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipo = new Empleado();
        $tipo->ci =  $request->post('ci');
        $tipo->nombre =  $request->post('nombre');
        $tipo->paterno =  $request->post('paterno');
        $tipo->materno =  $request->post('materno');
        $tipo->sexo =  $request->post('sexo');
        $tipo->telefono =  $request->post('telefono');
        $tipo->save();
        return redirect()->route('empleado.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tipo = Empleado::find($id);
        return view('empleados.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tipo = Empleado::find($id);
        $tipo->ci =  $request->post('ci');
        $tipo->nombre =  $request->post('nombre');
        $tipo->paterno =  $request->post('paterno');
        $tipo->materno =  $request->post('materno');
        $tipo->sexo =  $request->post('sexo');
        $tipo->telefono =  $request->post('telefono');
        $tipo->save();
        return redirect()->route('empleado.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tipo = Empleado::find($id);
        //$tipo->delete();
        if ($tipo) {
            $tipo->update(['estado' => 0]);
        }

        return redirect()->route('empleado.index');
    }

    public function eliminados(){
        $tipos = Empleado::where('estado', 0)->get();
        return view('empleados.eliminados', compact('tipos'));
    }


    public function cambiarEstado($tipoId)
    {
    $tipo = Empleado::find($tipoId);

    if ($tipo) {
        $tipo->update(['estado' => 1]);
    }

    return redirect()->route('empleado.index');
    }
}