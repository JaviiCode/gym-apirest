<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanesTablaEntrenamiento extends Model
{
    /** @use HasFactory<\Database\Factories\PlanesTablaEntrenamientoFactory> */
    use HasFactory;
    protected $table = 'planestablaentrenamientos';
    protected $primaryKey = 'id_plan_tabla';

    protected $fillable = [
        'id_plan',
        'id_tabla',
    ];

    // Relaciones
    public function planEntrenamiento()
    {
        return $this->belongsTo(PlanesEntrenamiento::class, 'id_plan');
    }

    public function tablaEntrenamiento()
    {
        return $this->belongsTo(TablasEntrenamiento::class, 'id_tabla');
    }
}
