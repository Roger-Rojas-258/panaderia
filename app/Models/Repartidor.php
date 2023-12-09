<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repartidor extends Model
{
    use HasFactory;
    protected $table = 'repartidor';
    protected $primaryKey ='id_repartidor';
    protected $fillable =[
        'ci',
        'nombre',
        'paterno',
        'materno',
        'fecha_nacimiento',
        'tota_propina',
        'sexo',
        'telefono',
        'estado',
    ];
    public $timestamps = true;
}