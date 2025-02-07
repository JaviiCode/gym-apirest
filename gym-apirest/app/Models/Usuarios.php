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

    /*public function usuarioInfo(){
        $planesEntrenamiento = $this->planesComoCliente;

        foreach($planesEntrenamiento as $planEntrenamiento){
            $tablas = $planEntrenamiento->tablasEntrenamiento();
            foreach($tablas as $tabla){
                $series = $tabla->series();
                foreach($series as $serie){
                    $serie->ejercicio();
                }
            }
            $planesNutricionales = $this->planesNutricionalesComoCliente;
            foreach($planesNutricionales as $plan){
                $plan->nutricionista;
            }
        }
    }*/

    public function usuarioInfo()
    {
        $planes = $this->planesComoCliente;
        $tablas = [];

        foreach ($planes as $plan) {//Se recorre cada plan del usuario
            foreach ($plan->tablasEntrenamiento as $tabla) {//Se recorre cada tabla de cada plan y cada uno se guarda
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


    public function series()
    {
        $tablas = $this->tablasEntrenamiento();
        $series = [];

        foreach ($tablas as $tabla) {
            foreach ($tabla->series as $serie) {
                $series[] = $serie;
            }
        }

        return $series;

    }

    public function ejercicios()
    {
        $series = $this->series();
        $ejercicios = [];

        foreach ($series as $serie) {
            $ejercicios[] = $serie->ejercicio;
        }

        return $ejercicios;
    }

    public function entrenadores()
    {
        $planes = $this->planesComoCliente;
        $entrenadores = [];

        foreach ($planes as $plan) {
            $entrenadores[] = $plan->entrenador;
        }

        return $entrenadores;
    }

    public function nutricionistas()
    {
        $planes = $this->planesNutricionalesComoCliente;
        $nutricionistas = [];

        foreach ($planes as $plan) {
            $nutricionistas[] = $plan->nutricionista;
        }

        return $nutricionistas;
    }

    public function tiposMusculo()
    {
        $ejercicios = $this->ejercicios();
        $tipos = [];

        foreach ($ejercicios as $ejercicio) {
            $tipos[] = $ejercicio->tipoMusculo;
        }

        return $tipos;
    }

}
