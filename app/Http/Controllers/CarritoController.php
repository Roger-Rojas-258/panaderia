<?php

namespace App\Http\Controllers;

use App\Models\Ofertadia;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Productooferta;
use Carbon\Carbon;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fechaActual = Carbon::now()->toDateString();
        $ofertaDia = Ofertadia::where('fecha', $fechaActual)->first();
        $productoofertas = Productooferta::where('id_oferta', $ofertaDia->id_oferta)->get();
        $productos = Producto::where('estado', 1)->get();

        return view('carrito', compact('productos', 'productoofertas'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}