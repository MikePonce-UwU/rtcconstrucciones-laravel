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
        'DESCRIPCION_ENTRADA',    'FECHA_ENTRADA',    'ID_USUARIO',    'ID_BODEGA_PROYECTO',
    ];
    //has many
    public function detalle_entrada()
    {
        return $this->hasMany(DetalleEntrada::class, 'ID_ENTRADA', 'ID_ENTRADA');
    }

    //belongs to
    public function bodega_proyecto()
    {
        return $this->belongsTo(Bodega::class, 'ID_BODEGA_PROYECTO', 'ID_BODEGA_PROYECTO');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'ID_USUARIO', 'id');
    }
}
