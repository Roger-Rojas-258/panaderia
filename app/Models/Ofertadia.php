<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ofertadia extends Model
{
    use HasFactory;
    protected $table = 'ofertadia';
    protected $primaryKey ='id_oferta';
    protected $fillable =[
        'fecha',
    ];
    public $timestamps = true;
}