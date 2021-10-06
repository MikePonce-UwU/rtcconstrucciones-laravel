<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
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
    ];
}
