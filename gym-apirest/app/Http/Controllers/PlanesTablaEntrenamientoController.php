<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlanesTablaEntrenamientoCollection;
use App\Http\Resources\PlanesTablaEntrenamientoResource;
use App\Models\PlanesTablaEntrenamiento;
use App\Http\Requests\StorePlanesTablaEntrenamientoRequest;
use App\Http\Requests\UpdatePlanesTablaEntrenamientoRequest;

class PlanesTablaEntrenamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planTablas = PlanesTablaEntrenamiento::paginate(10);
        return new PlanesTablaEntrenamientoCollection($planTablas->loadMissing('planEntrenamiento', 'tablaEntrenamiento'));
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
    public function store(StorePlanesTablaEntrenamientoRequest $request)
    {
        $nuevoPlanTabla = PlanesTablaEntrenamiento::create($request->all());
        return new PlanesTablaEntrenamientoResource($nuevoPlanTabla);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $planTabla = PlanesTablaEntrenamiento::findOrFail($id);
        return new PlanesTablaEntrenamientoResource($planTabla->loadMissing('planEntrenamiento', 'tablaEntrenamiento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlanesTablaEntrenamiento $planesTablaEntrenamiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlanesTablaEntrenamientoRequest $request, PlanesTablaEntrenamiento $planesTablaEntrenamiento)
    {
        $actualizado = $planesTablaEntrenamiento->update($request->all());
        return response()->json(['success' => $actualizado]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlanesTablaEntrenamiento $planesTablaEntrenamiento)
    {
        //
    }
}
