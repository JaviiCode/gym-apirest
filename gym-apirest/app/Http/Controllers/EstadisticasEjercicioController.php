<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteEstadisticasEjercicioRequest;
use App\Http\Resources\EstadisticasEjercicioResource;
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
        $estadistica = EstadisticasEjercicio::create($request->all());
        return new EstadisticasEjercicioResource($estadistica);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $estadistica = EstadisticasEjercicio::findOrFail($id);
        if(!$estadistica){
            return 'Peticion no encontrada';
        }
        return new EstadisticasEjercicioResource($estadistica->loadMissing('ejercicio'));
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
    public function update(UpdateEstadisticasEjercicioRequest $request, $id)
    {
        $estadistica = EstadisticasEjercicio::findOrFail($id);
        $actualizado = $estadistica->update($request->all());
        return response()->json(['success' => $actualizado]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteEstadisticasEjercicioRequest $request, $id)
    {
        $estadistica = EstadisticasEjercicio::find($id);
        $estadistica->delete();
        return response("Eliminacion Completada.");
    }
}
