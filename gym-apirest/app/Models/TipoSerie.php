<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoSerie extends Model
{
    /** @use HasFactory<\Database\Factories\TipoSerieFactory> */
    use HasFactory;
    protected $table = 'tiposerie';
}
