<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuarios extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UsuariosFactory> */
    use HasFactory;
    use HasApiTokens;
    use Notifiable;
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';

    const CREATE_AT = 'fecha_registro';
    protected $fillable = [
        'email',
        'clave',
        'id_tipo_usuario',
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


    public static function usuarioCliente( $usuario){
        $tipoCliente=TipoUsuario::where('tipo_usuario', 'cliente')->first();
        return $usuario->id_tipo_usuario == $tipoCliente->id_tipo_usuario;
    }
    public static function usuarioAdmin( $usuario){
        $tipoAdmin=TipoUsuario::where('tipo_usuario', 'administrador')->first();
        return $usuario->id_tipo_usuario == $tipoAdmin->id_tipo_usuario;
    }
    public static function usuarioGestor( $usuario){
        $tipoGestor=TipoUsuario::where('tipo_usuario', 'gestor')->first();
        return $usuario->id_tipo_usuario == $tipoGestor->id_tipo_usuario;
    }

    public static function usuarioEntrenador( $usuario){
        $tipoEntrenador=TipoUsuario::where('tipo_usuario', 'entrenador')->first();
        return $usuario->id_tipo_usuario == $tipoEntrenador->id_tipo_usuario;
    }

    public static function usuarioNutricionista( $usuario){
        $tipoNutricionista=TipoUsuario::where('tipo_usuario', 'nutricionista')->first();
        return $usuario->id_tipo_usuario == $tipoNutricionista->id_tipo_usuario;
    }

    public function usuarioInfo()
    {
        $planes = $this->planesComoCliente;
        $tablas = [];

        foreach ($planes as $plan) {
            foreach ($plan->tablasEntrenamiento as $tabla) {
                $tablas[] = $tabla;
            }
        }
        $series = [];

        foreach ($tablas as $tabla) {
            foreach ($tabla->series as $serie) {
                $series[] = $serie;
            }
        }
        $ejercicios = [];

        foreach ($series as $serie) {
            $ejercicios[] = $serie->ejercicio;
        }
        $entrenadores = [];

        foreach ($planes as $plan) {
            $entrenadores[] = $plan->entrenador;
        }
        $nutricionistas = [];

        foreach ($this->planesNutricionalesComoCliente as $plan) {
            $nutricionistas[] = $plan->nutricionista;
        }
        $tipos = [];

        foreach ($ejercicios as $ejercicio) {
            $tipos[] = $ejercicio->tipoMusculo;
        }

        return $tablas;
    }

    public function tablasEntrenamiento() {
        $planes = $this->planesEntrenamiento;
        $tablas = [];

        foreach($planes as $plan) {
            foreach($plan->tablasEntrenamiento as $tabla) {
                $tablas[] = $tabla;
            }
        }

        return $tablas;
    }
}
