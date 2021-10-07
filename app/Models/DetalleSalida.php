<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleSalida extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_DETALLE_SALIDA';
    protected $table = 'detalle_salida';
    public $timestamps = false;
    protected $fillable = [
        'ESTADO_DESC',
        'CANTIDAD',
        'ID_PRODUCTO',
        'ID_SALIDA',
    ];
}
