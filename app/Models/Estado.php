<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_ESTADO';
    protected $table = 'estado';
    public $timestamps = false;
    protected $fillable = [
        'NOMBRE',
        'DESCRIPCION',
    ];
    /**
     * Get all of the producto for the Estado
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function producto()
    {
        return $this->hasMany(Producto::class, 'ID_ESTADO', 'ID_ESTADO');
    }
}
