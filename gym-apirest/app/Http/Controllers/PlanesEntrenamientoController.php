<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlanesEntrenamientoCollection;
use App\Http\Resources\PlanesEntrenamientoResource;
use App\Models\PlanesEntrenamiento;
use App\Http\Requests\StorePlanesEntrenamientoRequest;
use App\Http\Requests\UpdatePlanesEntrenamientoRequest;
use App\Models\TablasEntrenamiento;

class PlanesEntrenamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plan = PlanesEntrenamiento::paginate(10);
        return new PlanesEntrenamientoResource($plan->loadMissing('entrenador', 'cliente', 'PlanesEntrenamiento', 'TablasEntrenamiento'));
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
    public function store(StorePlanesEntrenamientoRequest $request)
    {
        $plan = PlanesEntrenamiento::create($request->all());
        return new PlanesEntrenamientoResource($plan);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $plan = PlanesEntrenamiento::find($id);
        return new PlanesEntrenamientoResource($plan->loadMissing('entrenador', 'cliente','TablasEntrenamiento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlanesEntrenamiento $planesEntrenamiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlanesEntrenamientoRequest $request, PlanesEntrenamiento $planesEntrenamiento)
    {
        $actualizado = $planesEntrenamiento->update($request->all());
        return response()->json(['success' => $actualizado]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlanesEntrenamiento $planesEntrenamiento)
    {
        //
    }
}
