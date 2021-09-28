<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_BODEGA_PROYECTO';
    protected $fillable = [
        'NOMBRE_BODEGA',
        'DIRECCION',
        'NOMBRE_ENCARGADO',
        'FECHA_CREACION',
        'FECHA_CIERRE',
        'CAPACIDAD',
        'ID_PROYECTO',
    ];
    public $timestamps = false;
}
