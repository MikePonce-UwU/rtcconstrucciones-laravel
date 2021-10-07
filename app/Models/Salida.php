<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_SALIDA';
    protected $table = 'salida';
    public $timestamps = false;
    protected $fillable = [
        'DESCRIPCION_SALIDA',
        'FECHA_SALIDA',
        'ID_BODEGA_PROYECTO',
        'ID_USUARIO',
    ];
    public function detalle_salida()
    {
        return $this->hasMany(DetalleSalida::class);
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
