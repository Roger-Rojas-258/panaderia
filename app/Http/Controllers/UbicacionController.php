<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Ubicacion $ubicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ubicacion $ubicacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ubicacion $ubicacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ubicacion $ubicacion)
    {
        //
    }
    public function guardarUbicacion(Request $request){
    $datos = $request->json()->all();

    /*if (!empty($datos['longitud']) && !empty($datos['latitud']) && !empty($datos['direccion'])) {*/
        $ubicacion = new Ubicacion();
        $ubicacion->longitud = $datos['longitud'];
        $ubicacion->latitud = $datos['latitud'];
        $ubicacion->referencia = $datos['referencia'];
        $ubicacion->descripcion = $datos['descripcion'];
        $ubicacion->save();
        // Puedes devolver una respuesta JSON indicando el éxito.
        return response()->json(['status' => 200, 'message' => 'Ubicación guardada correctamente']);
    /*} else {
        // Puedes devolver una respuesta JSON indicando que faltan datos.
        return response()->json(['status' => 400, 'message' => 'Faltan datos necesarios']);
    }*/
    }
}