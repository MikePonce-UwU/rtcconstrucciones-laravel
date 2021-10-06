<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_ENTRADA';
    protected $table = 'entrada';
    public $timestamps = false;
    protected $fillable = [
        'DESCRIPCION_ENTRADA',
        'FECHA_ENTRADA',
        'ID_BODEGA_PROYECTO',
        'ID_USUARIO',
    ];
    public function detalle_entrada()
    {
        return $this->hasMany(DetalleEntrada::class);
    }
    public function bodega_proyecto()
    {
        return $this->belongsTo(Bodega::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
