<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    /** @use HasFactory<\Database\Factories\SeriesFactory> */
    use HasFactory;
    protected $table = 'series';
    protected $primaryKey = 'id_serie';

    protected $fillable = [
        'repeticiones_min',
        'repeticiones_max',
        'peso',
        'duracion',
        'descanso',
        'id_ejercicio',
        'id_tabla',
        'id_tipo_serie',
    ];

    // Relaciones
    public function ejercicio()
    {
        return $this->belongsTo(Ejercicios::class, 'id_ejercicio');
    }

    public function tablaEntrenamiento()
    {
        return $this->belongsTo(TablasEntrenamiento::class, 'id_tabla');
    }

    public function tipoSerie()
    {
        return $this->belongsTo(TipoSerie::class, 'id_tipo_serie');
    }
}
