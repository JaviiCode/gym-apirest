<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoSerie extends Model
{
    /** @use HasFactory<\Database\Factories\TipoSerieFactory> */
    use HasFactory;
    protected $table = 'tiposerie';
    protected $primaryKey = 'id_tipo_serie';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];
    public function series()
    {
        return $this->hasMany(Series::class, 'id_tipo_serie');
    }
}
