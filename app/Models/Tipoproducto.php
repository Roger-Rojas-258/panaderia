<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipoproducto extends Model
{
    use HasFactory;
    protected $table = 'tipo_producto';
    protected $primaryKey = 'id_tipo';
    protected $fillable = [
        'nombre',
        'estado',
    ];
    public $timestamps = true;
}
