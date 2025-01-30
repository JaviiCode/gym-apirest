<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMusculo extends Model
{
    /** @use HasFactory<\Database\Factories\TipoMusculoFactory> */
    use HasFactory;
    protected $table = 'tiposmusculo';
}
