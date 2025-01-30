<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadisticasEjercicio extends Model
{
    /** @use HasFactory<\Database\Factories\EstadisticasEjercicioFactory> */
    use HasFactory;
    protected $table = 'estadisticasejercicio';
}
