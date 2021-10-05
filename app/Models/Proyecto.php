<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Proyecto extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_PROYECTO';
    protected $table = 'proyecto';
    protected $fillable = [
        'NOMBRE',
        'FECHA_INICIO',
        'FECHA_FINALIZACION',
        'DESCRIPCION',
        'DIRECCION',
        'TIPO',
    ];
    public $timestamps = false;
    public function bodega_proyecto()
    {
        return $this->HasOne(Bodega::class);
    }
}
