<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ofertadia extends Model
{
    use HasFactory;
    protected $table = 'ofertadia';
    protected $primaryKey = 'id_oferta';
    protected $fillable = [
        'fecha',
    ];
    public $timestamps = true;

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_ofertadia', 'id_oferta', 'id_producto')
            ->withPivot('stock')
            ->withTimestamps();
    }
}
