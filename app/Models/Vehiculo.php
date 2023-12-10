<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
    protected $table = 'vehiculo';
    protected $primaryKey = 'placa';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'modelo',
        'marca',
        'color',
        'estado_uso',
        'imagen',
        'id_tipoVehiculo',
    ];
    public $timestamps = true;
}
