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
        'CANTIDAD',    'ID_PRODUCTO',    'ID_ENTRADA',    'ID_ESTADO',
    ];
    //belongs to
    public function entrada()
    {
        return $this->belongsTo(Entrada::class, 'ID_ENTRADA', 'ID_ENTRADA');
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'ID_ESTADO', 'ID_ESTADO');
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_PRODUCTO', 'ID_PRODUCTO');
    }
}
