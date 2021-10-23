<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_PROYECTO';
    protected $table = 'proyecto';
    protected $fillable = [
        'NOMBRE',    'DESCRIPCION',    'DIRECCION',    'FECHA_INICIO',    'FECHA_FINALIZACION',    'ID_TIPO_PROYECTO',    'ID_ESTADO',
    ];
    public $timestamps = false;
    protected $dates = ['FECHA_INICIO', 'FECHA_FINALIZACION'];
    //hasone
    public function bodega_proyecto()
    {
        return $this->HasOne(Bodega::class);
    }

    //belongs to
    public function tipo_proyecto()
    {
        return $this->belongsTo(TipoProyecto::class, 'ID_TIPO_PROYECTO', 'ID_TIPO_PROYECTO');
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'ID_ESTADO', 'ID_ESTADO');
    }
}
