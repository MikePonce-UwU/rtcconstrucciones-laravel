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
        'NOMBRE',    'CANTIDAD',    'PRECIO',   'ID_COMPRA',    'ID_CATEGORIA',    'ID_UND_MEDIDA',

    ];
    //belongs to
    public function compra()
    {
        return $this->belongsTo(Compra::class, 'ID_COMPRA', 'ID_COMPRA');
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'ID_CATEGORIA', 'ID_CATEGORIA');
    }
    public function unidad_medida()
    {
        return $this->belongsTo(Und_Medida::class, 'ID_UND_MEDIDA', 'ID_UND_MEDIDA');
    }
}
