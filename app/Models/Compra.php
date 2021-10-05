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
        'ID_COMPRA',
        'DESCRIPCION',
        'FECHA_COMPRA',
        'GASTO_TOTAL',
        'ID_BODEGA_PROYECTO',
    ];
    public function detalle_compra()
    {
        return $this->hasMany(DetalleCompra::class);
    }
    public function bodega_proyecto()
    {
        return $this->belongsTo(Bodega::class);
    }
}
