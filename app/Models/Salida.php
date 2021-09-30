<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_SALIDA';
    protected $tableName = 'salida';
    public $timestamps = false;
    protected $fillable = [
        'ID_SALIDA',
        'FECHA_SALIDA',
        'DESCRIPCION_SALIDA',
        'ID_BODEGA_PROYECTO',
    ];
}
