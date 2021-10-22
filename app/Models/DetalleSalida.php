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
        'CANTIDAD',    'ID_PRODUCTO',    'ID_SALIDA',    'ID_ESTADO',
    ];
    //belongs to
    public function salida()
    {
        return $this->belongsTo(Salida::class, 'ID_SALIDA', 'ID_SALIDA');
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_PRODUCTO', 'ID_PRODUCTO');
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'ID_ESTADO', 'ID_ESTADO');
    }
}
