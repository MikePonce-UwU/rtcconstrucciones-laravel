<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //Editar tabla de productos con siguiente query:
    /* ALTER TABLE
        producto 
    ADD 
        COLUMN UNIDAD_MEDIDA ENUM('Unidad(es)', 'Libra(s)', 'Kilo(s)') NOT NULL; */
    use HasFactory;
    protected $primaryKey = 'ID_PRODUCTO';
    protected $table = 'producto';
    public $timestamps = false;
    protected $fillable = [
        'NOMBRE',
        'CANTIDAD',
        'ESTADO_DESC',
        'ID_ESTADO',
        'ID_CATEGORIA',
        'UNIDAD_MEDIDA',
    ];
}
