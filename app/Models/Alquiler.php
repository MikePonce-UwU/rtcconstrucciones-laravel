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
        'NOMBRE_EMPRESA',    'DIRECCION',    'TELEFONO',    'FECHA_ALQUILER',    'TOTAL_PAGAR',    'ID_ESTADO',
    ];
    public $timestamps = false;
    protected $dates = ['FECHA_ALQUILER'];

    public function detalle_alquiler()
    {
        return $this->hasMany(DetalleAlquiler::class, 'ID_ALQUILER', 'ID_ALQUILER');
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'ID_ESTADO', 'ID_ESTADO');
    }
}
