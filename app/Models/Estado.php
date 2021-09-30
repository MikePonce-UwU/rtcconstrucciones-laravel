<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_ESTADO';
    protected $tableName = 'estado';
    public $timestamps = false;
    protected $fillable = [
        'NOMBRE',
        'DESCRIPCION',
    ];
}
