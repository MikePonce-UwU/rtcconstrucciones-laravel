<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_COMPRA';
    protected $table = 'compra';
    public $timestamps = false;
    protected $fillable = [
        'DESCRIPCION',    'FECHA_COMPRA',    'GASTO_TOTAL',    'ID_BODEGA_PROYECTO',    'ID_ESTADO',
    ];
    protected $dates = ['FECHA_COMPRA'];
    //has many
    public function detalle_compra()
    {
        return $this->hasMany(DetalleCompra::class, 'ID_COMPRA', 'ID_COMPRA');
    }

    //belongs to
    public function bodega_proyecto()
    {
        return $this->belongsTo(Bodega::class, 'ID_BODEGA_PROYECTO', 'ID_BODEGA_PROYECTO');
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'ID_ESTADO', 'ID_ESTADO');
    }
}
