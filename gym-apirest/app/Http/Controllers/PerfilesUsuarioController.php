<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeletePerfilesUsuarioRequest;
use App\Http\Requests\IndexEjercicioRequest;
use App\Http\Requests\ShowPerfilesUsuariosRequest;
use App\Http\Resources\PerfilesUsuarioCollection;
use App\Http\Resources\PerfilesUsuarioResource;
use App\Models\PerfilesUsuario;
use App\Http\Requests\StorePerfilesUsuarioRequest;
use App\Http\Requests\UpdatePerfilesUsuarioRequest;
use App\Models\Usuarios;

class PerfilesUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexEjercicioRequest $request)
    {
        $perfilesUsuario = PerfilesUsuario::paginate(10);
        return new PerfilesUsuarioCollection($perfilesUsuario);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePerfilesUsuarioRequest $request)
    {
        if(!Usuarios::find($request->id_usuario)){
            return response('Error, Usuario no existe.');
        }
        $nuevoPerfil = PerfilesUsuario::create($request->all());
        return new PerfilesUsuarioResource($nuevoPerfil);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowPerfilesUsuariosRequest $request, $id)
    {
        $perfilUsuario = PerfilesUsuario::find($id);
        if (!$perfilUsuario) {
            return response('Peticion no encontrada', 205);
        }

        $usuario = $request->user();
        if ($usuario->id_usuario != $perfilUsuario->id_usuario && !Usuarios::usuarioAdmin($usuario) && !Usuarios::usuarioGestor($usuario)) {
            return response('Error. Acceso no disponible', 401);
        }
        return new PerfilesUsuarioResource($perfilUsuario);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerfilesUsuario $perfilesUsuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePerfilesUsuarioRequest $request, PerfilesUsuario $perfilesUsuario)
    {
        if($request->id_usuario && !Usuarios::find($request->id_usuario)){
            return response('Error, Usuario no existe.');
        }
        $actualizado = $perfilesUsuario->update($request->all());
        return response()->json(['success' => $actualizado]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeletePerfilesUsuarioRequest $request, $id)
    {
        $perfil = PerfilesUsuario::find($id);
        $perfil->delete();
        return response("Eliminacion Completada.");
    }
}
