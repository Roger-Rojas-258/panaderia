<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notapedido extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'nota_pedido';
    protected $primaryKey = 'id_pedido';
    protected $fillable = [
        'fecha',
        'total_precio',
        'costo_envio',	
        'tiempo_estimado',
        'estad-entrega',
        'id_cliente',
        'id_ubicacion',
        'id_repartidorvehiculo',
        'id_pago',

    ];
    public $timestamps = true;
}