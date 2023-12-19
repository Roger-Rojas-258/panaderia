<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Repartidor;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::where('estado',1)->get();
        //$empleado = Empleado::where('estado',1)->get();
        //$repartidor = Repartidor::where('estado',1)->get();
        $usuarios =  Usuario::where('estado', 1)->get();
        $roles = Rol::where('estado',1)->get();
        return view('usuarios.index', compact('usuarios',/*'clientes','empleado','repartidor',*/'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = new Usuario();
        $usuario->usuario =  $request->post('usuario');
        $usuario->passw =  $request->post('passw');
        $usuario->id_rol =  $request->post('id_rol');
        $usuario->id_repartidor =  $request->post('id_repartidor');
        $usuario->id_empleado =  $request->post('id_empleado');
        $usuario->save();
        return redirect()->route('usuario.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        $usuario->usuario =  $request->post('usuario');
        $usuario->passw =  $request->post('passw');
        $usuario->id_rol =  $request->post('id_rol');
        $usuario->id_repartidor =  $request->post('id_repartidor');
        $usuario->id_empleado =  $request->post('id_empleado');
        $usuario->save();
        return redirect()->route('usuario.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        //$tipo->delete();
        if ($usuario) {
            $usuario->update(['estado' => 0]);
        }

        return redirect()->route('usuario.index');
    }
    
    public function eliminados(){
        $usuario = Usuario::where('estado', 0)->get();
        return view('usuarios.eliminados', compact('usuario'));
    }


    public function cambiarEstado($tipoId)
    {
    $usuario = Usuario::find($tipoId);

    if ($usuario) {
        $usuario->update(['estado' => 1]);
    }

    return redirect()->route('usuario.index');
    }
}