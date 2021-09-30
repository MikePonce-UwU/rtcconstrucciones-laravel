<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_ENTREGA_ALQUILER';
    protected $tableName = 'entrega_alquiler';
    public $timestamps = false;
    protected $fillable = [
        'ID_DETALLE_COMPRA',
        'ID_COMPRA',
        'NOMBRE',
        'CANTIDAD',
        'PRECIO',
        'ID_CATEGORIA',
    ];
}
