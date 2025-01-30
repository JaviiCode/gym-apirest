<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanesEntrenamiento extends Model
{
    /** @use HasFactory<\Database\Factories\PlanesEntrenamientoFactory> */
    use HasFactory;
    protected $table = 'planesentrenamiento';
}
