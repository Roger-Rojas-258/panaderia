<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME; // en caso de exito del registro, se redirige a esta vista

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'usuario' => ['required', 'string', 'max:255', 'unique:users'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $cliente = new Cliente();
        $cliente->nombre = $data['nombre'];
        $cliente->paterno = $data['paterno'];
        $cliente->materno = $data['materno'];
        $cliente->telefono = $data['telefono'];
        $cliente->fecha_nacimiento = $data['fechaNacimiento'];
        $cliente->sexo = $data['sexo'];
        $cliente->save();

        return User::create([
            'usuario' => $data['usuario'],
            // 'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'id_rol' => 2,
            'id_cliente' => $cliente->id_cliente,
            'id_repartidor' => null,
            'id_empleado' => null,
        ]);
    }
}
