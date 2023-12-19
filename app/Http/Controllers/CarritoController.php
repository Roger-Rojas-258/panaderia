<?php

namespace App\Http\Controllers;

use App\Models\Ofertadia;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Productooferta;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $fechaActual = Carbon::now()->addDay();

        $i = 0;
        do {
            $fechaActual = $fechaActual->subDay();
            //return [$fechaActual->toDateString(), '----', $fechaActual->subDay()->toDateString(),];
            $ofertaDia = Ofertadia::where('fecha', $fechaActual->toDateString())->orderBy('id_oferta', 'desc')->first();
            $i++;
        } while (!$ofertaDia && $i < 50);

        $productoofertas = Productooferta::where('id_oferta', $ofertaDia ? $ofertaDia->id_oferta : 0)->get();
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
