<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleado';
    protected $primaryKey ='id_empleado';
    protected $fillable =[
        'ci',
        'nombre',
        'paterno',
        'materno',
        'fecha_nacimiento',
        'sueldo',
        'sexo',
        'telefono',
        'estado',
    ];
    public $timestamps = true;
}