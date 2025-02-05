<?php

namespace App\Http\Controllers;

use App\Http\Resources\EstadisticasClienteCollection;
use App\Http\Resources\EstadisticasClienteResource;
use App\Models\EstadisticasCliente;
use App\Http\Requests\StoreEstadisticasClienteRequest;
use App\Http\Requests\UpdateEstadisticasClienteRequest;

class EstadisticasClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estadisticasCliente = EstadisticasCliente::paginate(10);
        return new EstadisticasClienteCollection($estadisticasCliente);
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
    public function store(StoreEstadisticasClienteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $estadisticaCliente = EstadisticasCliente::find($id);

        return new EstadisticasClienteResource($estadisticaCliente);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EstadisticasCliente $estadisticasCliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEstadisticasClienteRequest $request, EstadisticasCliente $id)
    {
        $estadisticaCliente = EstadisticasCliente::find($id);
        $estadisticaCliente->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EstadisticasCliente $estadisticasCliente)
    {
        //
    }
}
