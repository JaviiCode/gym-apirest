<?php

namespace App\Http\Controllers;

use App\Http\Resources\SuscripcionesCollection;
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Suscripciones $suscripciones)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suscripciones $suscripciones)
    {
        //
    }
}
