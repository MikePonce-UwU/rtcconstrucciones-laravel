<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_CATEGORIA';
    protected $table = 'categoria';
    public $timestamps = false;
    protected $fillable = [
        'NOMBRE',
        'DESCRIPCION',
    ];
}
