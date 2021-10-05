<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_DETALLE_COMPRA';
    protected $table = 'detalle_compra';
    public $timestamps = false;
    protected $fillable = [
        'ID_COMPRA',
        'NOMBRE',
        'CANTIDAD',
        'PRECIO',
        'ID_CATEGORIA',
    ];
}
