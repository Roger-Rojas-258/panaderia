<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = Cliente::where('estado', 1)->get();
        return view('clientes.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipo = new Cliente();
        $tipo->ci =  $request->post('ci');
        $tipo->nombre =  $request->post('nombre');
        $tipo->paterno =  $request->post('paterno');
        $tipo->materno =  $request->post('materno');
        $tipo->sexo =  $request->post('sexo');
        $tipo->telefono =  $request->post('telefono');
        $tipo->save();
        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tipo = Cliente::find($id);
        return view('clientes.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tipo = Cliente::find($id);
        $tipo->ci =  $request->post('ci');
        $tipo->nombre =  $request->post('nombre');
        $tipo->paterno =  $request->post('paterno');
        $tipo->materno =  $request->post('materno');
        $tipo->sexo =  $request->post('sexo');
        $tipo->telefono =  $request->post('telefono');
        $tipo->save();
        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tipo = Cliente::find($id);
        //$tipo->delete();
        if ($tipo) {
            $tipo->update(['estado' => 0]);
        }

        return redirect()->route('cliente.index');
    }

    public function eliminados(){
        $tipos = Cliente::where('estado', 0)->get();
        return view('clientes.eliminados', compact('tipos'));
    }


    public function cambiarEstado($tipoId)
    {
    $tipo = Cliente::find($tipoId);

    if ($tipo) {
        $tipo->update(['estado' => 1]);
    }

    return redirect()->route('cliente.index');
    }
}