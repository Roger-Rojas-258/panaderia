<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'cliente';
    protected $primaryKey ='id_cliente';
    protected $fillable =[
        'ci',
        'nombre',
        'paterno',
        'materno',
        'sexo',
        'telefono',
        'estado',
    ];
    public $timestamps = false;
}