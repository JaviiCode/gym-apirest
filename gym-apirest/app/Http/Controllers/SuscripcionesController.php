<?php

namespace App\Http\Controllers;

use App\Http\Resources\SuscripcionesCollection;
use App\Http\Resources\SuscripcionesResource;
use App\Models\Suscripciones;
use App\Http\Requests\StoreSuscripcionesRequest;
use App\Http\Requests\UpdateSuscripcionesRequest;

class SuscripcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suscripciones = Suscripciones::paginate(10);
        return new SuscripcionesCollection($suscripciones);
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
    public function store(StoreSuscripcionesRequest $request)
    {
        return new SuscripcionesResource(Suscripciones::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $suscripcion = Suscripciones::find($id);
        return new SuscripcionesResource($suscripcion);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suscripciones $suscripciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSuscripcionesRequest $request, Suscripciones $suscripciones)
    {
        $suscripciones->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suscripciones $suscripciones)
    {
    }
}
