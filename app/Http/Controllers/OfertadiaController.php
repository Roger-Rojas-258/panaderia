<?php

namespace App\Http\Controllers;

use App\Models\Ofertadia;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OfertadiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function createOferta()
    {
        $ultimaFecha = Ofertadia::max('fecha');
        $fechaActual = Carbon::now();
        $fechaActual = $fechaActual->format('Y-m-d'); 
        if($fechaActual>$ultimaFecha){
            Ofertadia::create([
            'fecha' => $fechaActual,
            ]);
        }
    }

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ofertadia $ofertadia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ofertadia $ofertadia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ofertadia $ofertadia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ofertadia $ofertadia)
    {
        //
    }
    
}