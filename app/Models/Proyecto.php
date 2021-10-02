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
        'NOMBRE',
        'FECHA_INICIO',
        'FECHA_FINALIZACION',
        'DIRECCION',
    ];
    public $timestamps = false;
}
