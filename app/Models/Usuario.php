<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuario';
    protected $primaryKey ='usuario';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable =[
        'passw',
        'id_rol',
        'id_repartido',
        'id_empleado',
        'estado',
    ];
    public $timestamps = true;
}