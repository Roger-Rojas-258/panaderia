<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'id_cliente' => 5,
            'nombre' => 'Roger',
            'paterno' => 'Rojas',
            'sexo' => 'M',
            'fecha_nacimiento' => '2000-01-30',
        ]);

        User::create([
            'usuario' => 'admin',
            'password' => 'admin2023',
            'id_rol' => 1,
            'id_cliente' => 5,

        ]);
    }
}
