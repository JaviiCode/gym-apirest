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
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('registrar', function () {

    $admin=Usuarios::where('email','admin@email.com')->first();
    if(!$admin){
    // Administrador
    $admin = new Usuarios();
    $admin->email = 'admin@email.com';
    $admin->clave = '1234';
    $admin->id_tipo_usuario = '1';
    $admin->save();
    }

    $adminToken = $admin->createToken('admin-token', ['admin']);
    $admin->token = $adminToken->plainTextToken;
    $admin->save();

    $gestor=Usuarios::where('email','gestor@email.com')->first();
    if(!$gestor){
    // Actualizador
    $gestor = new Usuarios();
    $gestor->email = 'gestor@email.com';
    $gestor->clave = '1234';
    $gestor->id_tipo_usuario = '2';
    $gestor->save();
    }
    $gestorToken = $gestor->createToken('gestor-token', ['usuarios', 'perfiles', 'ejercicios', 'estadisticas_cliente', 'suscripciones']);
    $gestor->token = $gestorToken->plainTextToken;
    $gestor->save();



    $entrenador=Usuarios::where('email','entrenador@email.com')->first();
    if(!$entrenador){
    // Actualizador
    $entrenador = new Usuarios();
    $entrenador->email = 'entrenador@email.com';
    $entrenador->clave = '1234';
    $entrenador->id_tipo_usuario = '3';
    $entrenador->save();
    }
    $entrenadorToken = $entrenador->createToken('entrenador-token', ['planes_entrenamiento', 'tablas_entrenamieto', 'series', 'estadisticas_ejercicio']);
    $entrenador->token = $entrenadorToken->plainTextToken;
    $entrenador->save();



    $nutricionista=Usuarios::where('email','nutricionista@email.com')->first();
    if(!$nutricionista){
    // Visor
    $nutricionista = new Usuarios();
    $nutricionista->email = 'nutricionista@email.com';
    $nutricionista->clave = '1234';
    $nutricionista->id_tipo_usuario = '4';
    $nutricionista->save();
    }
    $nutricionistaToken = $nutricionista->createToken('nutricionista-token', ['planes_nutricionales']);
    $nutricionista->token = $nutricionistaToken->plainTextToken;
    $nutricionista->save();

    $cliente=Usuarios::where('email','cliente@email.com')->first();
    if(!$cliente){
    // Visor
    $cliente = new Usuarios();
    $cliente->email = 'cliente@email.com';
    $cliente->clave = '1234';
    $cliente->id_tipo_usuario = '5';
    $cliente->save();
    }
    $clienteToken = $cliente->createToken('cliente-token');
    $cliente->token = $clienteToken->plainTextToken;
    $cliente->save();

    return [
        'admin' => $adminToken->plainTextToken,
        'gestor' => $gestorToken->plainTextToken,
        'entrenador' => $entrenadorToken->plainTextToken,
        'nutricionista' => $nutricionistaToken->plainTextToken,
        'cliente' => $clienteToken->plainTextToken
    ];
});




Route::group(['prefix' => 'javiigm', 'middleware'=>'auth:sanctum'], function(){
    Route::get('usuario_info/{id}', [UsuariosController::class,'usuarioInfo']);
    Route::apiResource('usuarios', UsuariosController::class);
    Route::apiResource('tipo_usuario', TipoUsuarioController::class);
    Route::apiResource('tipo_serie', TipoSerieController::class);
    Route::apiResource('tipo_musculo', TipoMusculoController::class);
    Route::apiResource('tablas_entrenamiento', TablasEntrenamientoController::class);
    Route::apiResource('suscripciones', SuscripcionesController::class);
    Route::apiResource('series', SeriesController::class);
    Route::apiResource('planes_nutricionales', PlanesNutricionalesController::class);
    Route::apiResource('planes_entrenamiento', PlanesEntrenamientoController::class);
    Route::apiResource('perfiles_usuario', PerfilesUsuarioController::class);
    Route::apiResource('estadisticas_ejercicio', EstadisticasEjercicioController::class);
    Route::apiResource('estadisticas_cliente', EstadisticasClienteController::class);
    Route::apiResource('ejercicio', EjerciciosController::class);

});
