<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntregaAlquiler extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_ENTREGA_ALQUILER';
    protected $tableName = 'entrega_alquiler';
    public $timestamps = false;
    protected $fillable = [];
}
