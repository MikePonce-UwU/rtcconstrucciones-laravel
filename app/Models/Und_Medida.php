<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Und_Medida extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_UND_MEDIDA';
    protected $table = 'und_medida';
    public $timestamps = false;
    protected $fillable = [
        'ABREVIACION',    'DESCRIPCION',
    ];
}
