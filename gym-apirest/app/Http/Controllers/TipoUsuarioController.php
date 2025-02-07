<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteTipoUsuarioRequest;
use App\Http\Resources\TipoUsuarioCollection;
use App\Http\Resources\TipoUsuarioResource;
use App\Models\TipoUsuario;
use App\Http\Requests\StoreTipoUsuarioRequest;
use App\Http\Requests\UpdateTipoUsuarioRequest;

class TipoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipousuarios = TipoUsuario::paginate(10);
        return new TipoUsuarioCollection($tipousuarios);
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
    public function store(StoreTipoUsuarioRequest $request)
    {
        $tipoUsuario = TipoUsuario::create($request->all());
        return new TipoUsuarioResource($tipoUsuario);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tipoUsuario = TipoUsuario::find($id);
        if(!$tipoUsuario){
            return 'Peticion no encontrada';
        }
        return new TipoUsuarioResource($tipoUsuario);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoUsuario $tipoUsuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoUsuarioRequest $request, TipoUsuario $tipoUsuario)
    {
        $actualizado = $tipoUsuario->update($request->all());
        return response()->json(['success' => $actualizado]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteTipoUsuarioRequest $request, $id)
    {
        $usuarios = TipoUsuario::find($id);
        $usuarios->delete();
        return response("Eliminacion Completada.");
    }
}
