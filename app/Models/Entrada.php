<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_ENTRADA';
    protected $tableName = 'entrada';
    public $timestamps = false;
    protected $fillable = [
        'ID_ENTRADA',
        'FECHA_ENTRADA',
        'DESCRIPCION_ENTRADA',
        'ID_BODEGA_PROYECTO',
    ];
}
