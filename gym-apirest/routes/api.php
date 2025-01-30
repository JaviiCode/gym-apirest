<?php

use App\Http\Controllers\EjerciciosController;
use App\Http\Controllers\EstadisticasClienteController;
use App\Http\Controllers\EstadisticasEjercicioController;
use App\Http\Controllers\PerfilesUsuarioController;
use App\Http\Controllers\PlanesEntrenamientoController;
use App\Http\Controllers\PlanesNutricionalesController;
use App\Http\Controllers\PlanesTablaEntrenamientoController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SuscripcionesController;
use App\Http\Controllers\TablasEntrenamientoController;
use App\Http\Controllers\TipoMusculoController;
use App\Http\Controllers\TipoSerieController;
use App\Http\Controllers\TipoUsuarioController;
use App\Http\Controllers\UsuariosController;
use App\Models\PlanesNutricionales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'javiigm'], function(){
    Route::apiResource('usuarios', UsuariosController::class);
    Route::apiResource('tipo_usuario', TipoUsuarioController::class);
    Route::apiResource('tipo_serie', TipoSerieController::class);
    Route::apiResource('tipo_musculo', TipoMusculoController::class);
    Route::apiResource('tablas_entrenamiento', TablasEntrenamientoController::class);
    Route::apiResource('suscripciones', SuscripcionesController::class);
    Route::apiResource('series', SeriesController::class);
    Route::apiResource('planes_tabla_entrenamiento', PlanesTablaEntrenamientoController::class);
    Route::apiResource('planes_nutricionales', PlanesNutricionalesController::class);
    Route::apiResource('planes_entrenamiento', PlanesEntrenamientoController::class);
    Route::apiResource('perfiles_usuario', PerfilesUsuarioController::class);
    Route::apiResource('estadisticas_ejercicio', EstadisticasEjercicioController::class);
    Route::apiResource('estadisticas_cliente', EstadisticasClienteController::class);
    Route::apiResource('ejercicio', EjerciciosController::class);

});
