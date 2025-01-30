<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlanesEntrenamientoCollection;
use App\Models\PlanesEntrenamiento;
use App\Http\Requests\StorePlanesEntrenamientoRequest;
use App\Http\Requests\UpdatePlanesEntrenamientoRequest;

class PlanesEntrenamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planesEntrenamiento = PlanesEntrenamiento::paginate(10);
        return new PlanesEntrenamientoCollection($planesEntrenamiento);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PlanesEntrenamiento $planesEntrenamiento)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlanesEntrenamiento $planesEntrenamiento)
    {
        //
    }
}
