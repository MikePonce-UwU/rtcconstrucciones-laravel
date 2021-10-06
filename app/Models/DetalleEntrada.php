<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEntrada extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_DETALLE_ENTRADA';
    protected $table = 'detalle_entrada';
    public $timestamps = false;
    protected $fillable = [
        'ESTADO_DESC',
        'CANTIDAD',
        'ID_PRODUCTO',
        'ID_ENTRADA',
    ];
}
