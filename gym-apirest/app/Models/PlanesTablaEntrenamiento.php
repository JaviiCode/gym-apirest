<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanesTablaEntrenamiento extends Model
{
    /** @use HasFactory<\Database\Factories\PlanesTablaEntrenamientoFactory> */
    use HasFactory;
    protected $table = 'planestablaentrenamientos';
}
