<?php

namespace App\Http\Controllers;

use App\Http\Resources\TablasEntrenamientoCollection;
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TablasEntrenamiento $tablasEntrenamiento)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TablasEntrenamiento $tablasEntrenamiento)
    {
        //
    }
}
