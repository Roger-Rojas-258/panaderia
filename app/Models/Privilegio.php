<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privilegio extends Model
{
    use HasFactory;
    protected $table = 'privilegio';
    protected $primaryKey ='id_privilegio';
    protected $fillable =[
        'descripcion',
        'estado',
    ];
    public $timestamps = false;
}