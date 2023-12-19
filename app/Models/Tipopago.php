<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipopago extends Model
{
    use HasFactory;
    protected $table = 'tipo_pago';
    protected $primaryKey = 'id_pago';
    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
    ];
    public $timestamps = true;
}
