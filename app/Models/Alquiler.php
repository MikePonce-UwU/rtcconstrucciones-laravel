<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_ALQUILER';
    protected $table = 'alquiler';
    protected $fillable = [
        'NOMBRE',
        'CANTIDAD',
        'FECHA_ALQUILER',
        'HORAS_ALQUILER',
        'PAGO_HORA',
        'ID_BODEGA_PROYECTO',
    ];
    public $timestamps = false;
}
