<?php

namespace App\Http\Controllers;

use App\Models\Tipopago;
use Illuminate\Http\Request;

class TipopagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = Tipopago::where('estado', 1)->get();
        return view('tipopagos.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/tipopagos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipo = new Tipopago();
        $tipo->nombre =  $request->post('nombre');
        $tipo->descripcion =  $request->post('descripcion');
        $tipo->save();
        return redirect()->route('tipopago.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipopago $tipopago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tipo = Tipopago::find($id);
        return view('tipopagos.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tipo = Tipopago::find($id);
        $tipo->nombre =  $request->post('nombre');
        $tipo->descripcion =  $request->post('descripcion');
        $tipo->save();
        return redirect()->route('tipopago.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tipo = Tipopago::find($id);
        //$tipo->delete();
        if ($tipo) {
            $tipo->update(['estado' => 0]);
        }

        return redirect()->route('tipopago.index');
    }
    public function eliminados(){
        $tipos = Tipopago::where('estado', 0)->get();
        return view('tipopagos.eliminados', compact('tipos'));
    }


    public function cambiarEstado($tipoId)
    {
    $tipo = Tipopago::find($tipoId);

    if ($tipo) {
        $tipo->update(['estado' => 1]);
    }

    return redirect()->route('tipopago.index');
    }
}