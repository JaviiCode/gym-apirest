<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripciones extends Model
{
    /** @use HasFactory<\Database\Factories\SuscripcionesFactory> */
    use HasFactory;
    protected $table = 'suscripciones';
    protected $primaryKey = 'id_suscripcion';

    protected $fillable = [
        'id_suscripcion',
        'tipo_suscripcion',
        'precio',
        'dias',
        'fecha_inicio',
        'fecha_fin',
    ];

    public function Usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_cliente');
    }

}

