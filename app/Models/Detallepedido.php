<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallepedido extends Model
{
    use HasFactory;
    protected $table = 'detalle_pedido';
    protected $primaryKey ='id_pedido';
    protected $fillable =[
        'cantidad',
        'sub_total',
        'id_oferta',
        'id_productooferta',
    ];
}