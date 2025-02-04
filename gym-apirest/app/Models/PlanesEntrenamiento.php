<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanesEntrenamiento extends Model
{
    /** @use HasFactory<\Database\Factories\PlanesEntrenamientoFactory> */
    use HasFactory;
    protected $table = 'planesentrenamiento';
    protected $primaryKey = 'id_plan';

    protected $fillable = [
        'id_entrenador',
        'id_cliente',
        'nombre',
        'fecha_inicio',
        'fecha_fin',
    ];

    public function entrenador()
    {
        return $this->belongsTo(Usuarios::class, 'id_entrenador');
    }

    public function cliente()
    {
        return $this->belongsTo(Usuarios::class, 'id_cliente');
    }
}
