<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProyecto extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_TIPO_PROYECTO';
    protected $table = 'tipo_proyecto';
    public $timestamps = false;
    protected $fillable = [
        'NOMBRE',    'DESCRIPCION',
    ];
}
