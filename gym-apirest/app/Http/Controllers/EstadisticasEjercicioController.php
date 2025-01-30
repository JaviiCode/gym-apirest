<?php

namespace App\Http\Controllers;

use App\Http\Resources\EstatisticasEjercicioCollection;
use App\Models\EstadisticasEjercicio;
use App\Http\Requests\StoreEstadisticasEjercicioRequest;
use App\Http\Requests\UpdateEstadisticasEjercicioRequest;

class EstadisticasEjercicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estadisticasEjercicio = EstadisticasEjercicio::paginate(10);
        return new EstatisticasEjercicioCollection($estadisticasEjercicio);
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
    public function store(StoreEstadisticasEjercicioRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EstadisticasEjercicio $estadisticasEjercicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EstadisticasEjercicio $estadisticasEjercicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEstadisticasEjercicioRequest $request, EstadisticasEjercicio $estadisticasEjercicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EstadisticasEjercicio $estadisticasEjercicio)
    {
        //
    }
}
