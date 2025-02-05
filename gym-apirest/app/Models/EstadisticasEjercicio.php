<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadisticasEjercicio extends Model
{
    /** @use HasFactory<\Database\Factories\EstadisticasEjercicioFactory> */
    use HasFactory;
    protected $table = 'estadisticasejercicio';
    protected $primaryKey = 'id_estadistica';

    protected $fillable = [
        'id_ejercicio',
        'num_sesiones',
        'tiempo_total',
        'duracion_media',
        'sets_completados',
        'volumen_total',
        'repeticiones_totales',
        'fecha_entrenamiento',
    ];

    // Relaciones
    public function ejercicio()
    {
        return $this->belongsTo(Ejercicios::class, 'id_ejercicio');
    }
}
