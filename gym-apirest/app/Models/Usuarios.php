<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    /** @use HasFactory<\Database\Factories\UsuariosFactory> */
    use HasFactory;
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'email',
        'fecha_registro',
    ];
    //Relaciones
    public function tipoUsuario()
    {
        return $this->belongsTo(TipoUsuario::class, 'id_tipo_usuario');
    }

    public function perfilUsuario()
    {
        return $this->hasMany(PerfilesUsuario::class, 'id_usuario');
    }

    public function Suscripciones()
    {
        return $this->hasMany(Suscripciones::class, 'id_cliente');
    }

    public function EstadisticaCliente()
    {
        return $this->hasMany(EstadisticasCliente::class, 'id_cliente');
    }

    public function planesComoEntrenador()
    {
        return $this->hasMany(PlanesEntrenamiento::class, 'id_entrenador');
    }

    public function planesComoCliente()
    {
        return $this->hasMany(PlanesEntrenamiento::class, 'id_cliente');
    }

    public function planesNutricionalesComoCliente()
    {
        return $this->hasMany(PlanesNutricionales::class, 'id_cliente');
    }

    public function planesNutricionalesComoNutricionista()
    {
        return $this->hasMany(PlanesNutricionales::class, 'id_nutricionista');
    }
}
