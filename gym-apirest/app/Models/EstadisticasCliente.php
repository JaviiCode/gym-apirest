<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadisticasCliente extends Model
{
    /** @use HasFactory<\Database\Factories\EstadisticasClienteFactory> */
    use HasFactory;
    protected $table = 'estadisticascliente';
}
