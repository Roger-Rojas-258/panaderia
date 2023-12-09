<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notaventa extends Model
{
    use HasFactory;
    protected $table = 'nota_venta';
    protected $primaryKey ='id_venta';
    protected $fillable =[
        'fecha',
        'total_precio',
        'id_cliente',
        'id_empleado',
        'id_pago',
    ];
    public $timestamps = true;
}