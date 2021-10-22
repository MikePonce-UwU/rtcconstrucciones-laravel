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
        'DESCRIPCION_SALIDA',    'FECHA_SALIDA',    'ID_USUARIO',    'ID_BODEGA_PROYECTO',
    ];
    //hasmany
    public function detalle_salida()
    {
        return $this->hasMany(DetalleSalida::class, 'ID_SALIDA', 'ID_SALIDA');
    }

    //belongs to
    public function bodega_proyecto()
    {
        return $this->belongsTo(Bodega::class, 'ID_BODEGA_PROYECTO', 'ID_BODEGA_PROYECTO');
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'ID_USUARIO', 'id');
    }
}
