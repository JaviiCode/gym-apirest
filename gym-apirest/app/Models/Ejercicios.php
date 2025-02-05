<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejercicios extends Model
{
    /** @use HasFactory<\Database\Factories\EjerciciosFactory> */
    use HasFactory;
    protected $table = 'ejercicios';
    protected $primaryKey = 'id_ejercicio';

    protected $fillable = [
        'nombre',
        'id_tipo_musculo',
        'descripcion',
    ];

    // Relaciones
    public function tipoMusculo()
    {
        return $this->belongsTo(TipoMusculo::class, 'id_tipo_musculo');
    }
    public function estadisticas()
    {
        return $this->hasMany(EstadisticasEjercicio::class, 'id_ejercicio');
    }
    public function series()
    {
        return $this->hasMany(Series::class, 'id_ejercicio');
    }
}
