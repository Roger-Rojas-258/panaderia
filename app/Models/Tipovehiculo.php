<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipovehiculo extends Model
{
    use HasFactory;
    protected $table ='tipo_vehiculo';
    protected $primaryKey = 'id_tipoVehiculo';
    protected $fillable = [
        'descripcion',
        'estado',
    ];
    public $timestamps = false;
}