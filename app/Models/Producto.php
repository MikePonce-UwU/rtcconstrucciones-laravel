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
        'NOMBRE',    'CANTIDAD',    'ID_ESTADO',    'ID_CATEGORIA',    'ID_UND_MEDIDA',
    ];
    //belongs to
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'ID_ESTADO', 'ID_ESTADO');
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'ID_CATEGORIA', 'ID_CATEGORIA');
    }
    public function unidad_medida()
    {
        return $this->belongsTo(Und_Medida::class, 'ID_UND_MEDIDA', 'ID_UND_MEDIDA');
    }

    //has many
    /**
     * Get all of the detalle_salida for the Producto
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detalle_salida()
    {
        return $this->hasMany(DetalleSalida::class, 'ID_PRODUCTO', 'ID_PRODUCTO');
    }
}
