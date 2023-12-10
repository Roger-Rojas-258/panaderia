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

    /*
    El primer argumento de hasMany es la clase del modelo con la que estás estableciendo 
    la relación (Producto::class en este caso). El segundo argumento es el nombre de la 
    columna que actúa como la clave foránea en la tabla Producto.
    */
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_tipo', 'id_tipo');
    }
}
