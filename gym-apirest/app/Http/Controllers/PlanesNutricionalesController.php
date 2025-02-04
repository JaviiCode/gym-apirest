<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlanesNutricionalesCollection;
use App\Http\Resources\PlanesNutricionalesResource;
use App\Models\PlanesNutricionales;
use App\Http\Requests\StorePlanesNutricionalesRequest;
use App\Http\Requests\UpdatePlanesNutricionalesRequest;

class PlanesNutricionalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $planesNutricionales = PlanesNutricionales::paginate(10);
        return new PlanesNutricionalesCollection($planesNutricionales);
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
    public function store(StorePlanesNutricionalesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $planNutricional = PlanesNutricionales::findOrFail($id);
        return new PlanesNutricionalesResource($planNutricional->loadMissing('nutricionista', 'cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlanesNutricionales $planesNutricionales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlanesNutricionalesRequest $request, PlanesNutricionales $planesNutricionales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlanesNutricionales $planesNutricionales)
    {
        //
    }
}
