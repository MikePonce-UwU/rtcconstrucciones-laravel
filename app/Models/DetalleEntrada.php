<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEntrada extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_DETALLE_ENTRADA';
    protected $tableName = 'detalle_entrada';
    public $timestamps = false;
    protected $fillable = [
        'ID_DETALLE_ENTRADA',
        'CANTIDAD',
        'ESTADO_DESC',
        'ID_PRODUCTO',
        'ID_ENTRADA',
    ];
}
