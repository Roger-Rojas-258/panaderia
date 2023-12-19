<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productooferta extends Model
{
    use HasFactory;
    protected $table = 'producto_ofertadia';
    protected $primaryKey ='id_productooferta';
    protected $fillable =[
        'stock',
        'id_oferta',
        'id_producto',
    ];
    public $timestamps = true;
}