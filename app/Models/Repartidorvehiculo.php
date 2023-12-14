<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repartidorvehiculo extends Model
{
    use HasFactory;
    protected $table = 'repartidor_vehiculo';
    protected $primaryKey = 'id_repartidorvehiculo';
    protected $fillable = [
        'id_repartidor',
        'placa',
    ];
    public $timestamps = true;
}