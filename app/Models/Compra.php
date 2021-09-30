<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_COMPRA';
    protected $tableName = 'compra';
    public $timestamps = false;
    protected $fillable = [
        'ID_COMPRA',
        'DESCRIPCION',
        'FECHA_COMPRA',
        'GASTO_TOTAL',
        'ID_BODEGA_PROYECTO',
    ];
}
