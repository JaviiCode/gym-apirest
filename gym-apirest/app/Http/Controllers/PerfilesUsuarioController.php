<?php

namespace App\Http\Controllers;

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $perfilUsuario = PerfilesUsuario::find($id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerfilesUsuario $perfilesUsuario)
    {
        //
    }
}
