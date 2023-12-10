<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'producto';
    protected $primaryKey = 'id_producto';
    protected $fillable = [
        'nombre',
        'precio',
        'id_tipo',
        'estado',
    ];
    public $timestamps = true;

    function tipoproducto()
    {
        //return $this->hasOne(Tipoproducto::class, 'id_tipo');
        return $this->belongsTo(Tipoproducto::class, 'id_tipo', 'id_tipo'); // decimos que en la tabla Producto hay una llave foranea llamada id_tipo 
    }

    public function ofertadias()
    {
        return $this->belongsToMany(Ofertadia::class, 'producto_ofertadia', 'id_producto', 'id_oferta')
            ->withPivot('stock')
            ->withTimestamps();
    }
}
