<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TablasEntrenamiento extends Model
{
    /** @use HasFactory<\Database\Factories\TablasEntrenamientoFactory> */
    use HasFactory;
    protected $table = 'tablasentrenamiento';
    protected $primaryKey = 'id_tabla';

    protected $fillable = [
        'semana',
        'nombre',
        'num_ejercicios',
        'num_dias',
    ];
    public function series()
    {
        return $this->hasMany(Series::class, 'id_tabla');
    }
    public function planesEntrenamiento()
    {
        return $this->belongsToMany(PlanesEntrenamiento::class, 'planestablaentrenamientos', 'id_tabla', 'id_plan');
    }
}
