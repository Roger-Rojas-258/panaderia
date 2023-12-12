<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Notapedido;
use App\Models\Producto;
use App\Models\Productooferta;
use App\Models\Tipopago;
use App\Models\Tipoproducto;
use Illuminate\Http\Request;

class NotapedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::where('estado', 1)->get();
        $categorias = Tipoproducto::all();
        $clientes = Cliente::where('estado',1)->get();
        $tipos = Tipopago::where('estado', 1)->get();
        // trarer todos loa productos que esten en producto venta
        $productoVentas = Productooferta::all();

        return view('viewsCliente.index', compact('productos','categorias','clientes','tipos','productoVentas'));
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
    public function show(Notapedido $notapedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notapedido $notapedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notapedido $notapedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notapedido $notapedido)
    {
        //
    }
}