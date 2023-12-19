<?php

namespace App\Http\Controllers;

use App\Models\Tipovehiculo;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos = Tipovehiculo::where('estado', 1)->get();
        $vehiculos = Vehiculo::where('estado', 1)->get();
        //$tipos = Empleado::where('estado', 1)->get();
        return view('vehiculos.index', compact('vehiculos'), compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos = Tipovehiculo::where('estado', 1)->get();
        return view('/vehiculos.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vehiculo = new Vehiculo();
        $vehiculo->placa =  $request->post('placa');
        $vehiculo->modelo =  $request->post('modelo');
        $vehiculo->marca =  $request->post('marca');
        $vehiculo->color =  $request->post('color');
        $vehiculo->estado_uso =  $request->post('estado_uso');
        $vehiculo->id_tipoVehiculo =  $request->post('id_tipoVehiculo');
        $vehiculo->save();
        return redirect()->route('vehiculo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vehiculos = Vehiculo::find($id);
        $tipos = Tipovehiculo::all();
        return view('vehiculos.edit', compact('vehiculos'), compact('tipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::find($id);
        $vehiculo->placa =  $request->post('placa');
        $vehiculo->modelo =  $request->post('modelo');
        $vehiculo->marca =  $request->post('marca');
        $vehiculo->color =  $request->post('color');
        $vehiculo->estado =  $request->post('estado');
        $vehiculo->id_tipoVehiculo =  $request->post('id_tipoVehiculo');
        $vehiculo->save();
        return redirect()->route('vehiculo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vehiculo = Vehiculo::find($id);
        //$tipo->delete();
        if ($vehiculo) {
            $vehiculo->update(['estado' => 0]);
        }

        return redirect()->route('vehiculo.index');
    }

    public function eliminados()
    {
        $vehiculos = Vehiculo::where('estado', 0)->get();
        $tipos = Vehiculo::all();
        return view('vehiculos.eliminados', compact('vehiculos'), compact('tipos'));
    }


    public function cambiarEstado($tipoId)
    {
        $vehiculo = Vehiculo::find($tipoId);

        if ($vehiculo) {
            $vehiculo->update(['estado' => 1]);
        }

        return redirect()->route('vehiculo.index');
    }
}