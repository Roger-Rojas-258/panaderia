<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalleventa extends Model
{
    use HasFactory;
    protected $table = 'detalle_venta';
    protected $primaryKey ='id_detalleventa';
    protected $fillable =[
        'cantidad',
        'sub_total',
        'id_productooferta',
        'id_venta',
    ];
}