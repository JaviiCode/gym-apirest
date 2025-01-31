<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadisticasCliente extends Model
{
    /** @use HasFactory<\Database\Factories\EstadisticasClienteFactory> */
    use HasFactory;
    protected $table = 'estadisticascliente';
    protected $primaryKey = 'id_estadistica_cliente';

    protected $fillable = [
        'peso',
        'altura',
        'grasa_corporal',
        'cintura',
        'pecho',
        'pierna',
        'biceps',
        'triceps',
    ];

    public function Usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_cliente');
    }
}
