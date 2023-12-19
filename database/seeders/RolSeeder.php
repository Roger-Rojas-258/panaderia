<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rol::create([
            'nombre' => 'Administrador',
            'descripcion' => 'Todos los permisos',
        ]);

        Rol::create([
            'nombre' => 'Cajero',
            'descripcion' => 'Permisos limitados',
        ]);

        Rol::create([
            'nombre' => 'Repartidor',
            'descripcion' => 'Permiso de pedidos',
        ]);

        Rol::create([
            'nombre' => 'Cliente',
            'descripcion' => 'Permiso de solicitar productos',
        ]);
    }
}
