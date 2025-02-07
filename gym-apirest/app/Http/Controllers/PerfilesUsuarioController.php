<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeletePerfilesUsuarioRequest;
use App\Http\Resources\PerfilesUsuarioCollection;
use App\Http\Resources\PerfilesUsuarioResource;
use App\Models\PerfilesUsuario;
use App\Http\Requests\StorePerfilesUsuarioRequest;
use App\Http\Requests\UpdatePerfilesUsuarioRequest;

class PerfilesUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
        $nuevoPerfil = PerfilesUsuario::create($request->all());
        return new PerfilesUsuarioResource($nuevoPerfil);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $perfilUsuario = PerfilesUsuario::find($id);
        if(!$perfilUsuario){
            return 'Peticion no encontrada';
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
