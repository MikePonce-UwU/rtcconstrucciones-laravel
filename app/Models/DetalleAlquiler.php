<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleAlquiler extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_DETALLE_ALQUILER';
    protected $table = 'detalle_alquiler';
    public $timestamps = false;
    protected $fillable = [
        'NOMBRE',    'CANTIDAD',    'HORAS_ALQUILER',    'HORAS_EXCEDIDAS',    'PAGO_HORA',    'PAGO_EXCEDIDO',    'SUBTOTAL',    'ID_BODEGA_PROYECTO',    'ID_ALQUILER',
    ];

    //has many

    //belongs to
    public function bodega_proyecto()
    {
        return $this->belongsTo(Bodega::class, 'ID_BODEGA_PROYECTO', 'ID_BODEGA_PROYECTO');
    }
    public function alquiler()
    {
        return $this->belongsTo(Alquiler::class, 'ID_ALQUILER', 'ID_ALQUILER');
    }
}
