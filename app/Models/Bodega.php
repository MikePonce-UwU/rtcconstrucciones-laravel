<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_BODEGA_PROYECTO';
    protected $table = 'bodega_proyecto';
    protected $fillable = [
        'NOMBRE_BODEGA',    'DIRECCION',    'FECHA_CREACION',    'FECHA_CIERRE',    'CAPACIDAD',    'CAPACIDAD_DISPONIBLE',    'ID_PROYECTO',    'ID_ESTADO',    'ID_USUARIO',
    ];
    public $timestamps = false;
    protected $dates = ['FECHA_CREACION', 'FECHA_CIERRE'];
    //belons to xd
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'ID_PROYECTO', 'ID_PROYECTO');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'ID_ESTADO', 'ID_ESTADO');
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'ID_USUARIO', 'id');
    }

    //has many
    public function compra()
    {
        return $this->hasMany(Compra::class, 'ID_BODEGA_PROYECTO', 'ID_BODEGA_PROYECTO');
    }
}
