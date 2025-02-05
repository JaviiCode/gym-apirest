<?php

namespace App\Http\Controllers;

use App\Http\Resources\TablasEntrenamientoCollection;
use App\Http\Resources\TablasEntrenamientoResource;
use App\Models\TablasEntrenamiento;
use App\Http\Requests\StoreTablasEntrenamientoRequest;
use App\Http\Requests\UpdateTablasEntrenamientoRequest;

class TablasEntrenamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tablasEntrenamiento = TablasEntrenamiento::paginate(10);
        return new TablasEntrenamientoCollection($tablasEntrenamiento);
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
    public function store(StoreTablasEntrenamientoRequest $request)
    {
        $nuevaTabla = TablasEntrenamiento::create($request->all());
        return new TablasEntrenamientoResource($nuevaTabla);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tabla = TablasEntrenamiento::findOrFail($id);
        return new TablasEntrenamientoResource($tabla);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TablasEntrenamiento $tablasEntrenamiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTablasEntrenamientoRequest $request, TablasEntrenamiento $tablasEntrenamiento)
    {
        $actualizado = $tablasEntrenamiento->update($request->all());
        return response()->json(['success' => $actualizado]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TablasEntrenamiento $tablasEntrenamiento)
    {
        //
    }
}
