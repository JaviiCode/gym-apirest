<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteSeriesRequest;
use App\Http\Resources\SeriesCollection;
use App\Http\Resources\SeriesResource;
use App\Models\Series;
use App\Http\Requests\StoreSeriesRequest;
use App\Http\Requests\UpdateSeriesRequest;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series = Series::paginate(10);
        return new SeriesCollection($series->loadMissing('ejercicio', 'tablaEntrenamiento', 'tipoSerie'));
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
    public function store(StoreSeriesRequest $request)
    {
        $nuevaSerie = Series::create($request->all());
        return new SeriesResource($nuevaSerie);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $serie = Series::findOrFail($id);
        if(!$serie){
            return 'Peticion no encontrada';
        }
        return new SeriesResource($serie->loadMissing('ejercicio', 'tablaEntrenamiento', 'tipoSerie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Series $series)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSeriesRequest $request, Series $series)
    {
        $actualizado = $series->update($request->all());
        return response()->json(['success' => $actualizado]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteSeriesRequest $request, $id)
    {
        $series = Series::find($id);
        $series->delete();
        return response("Eliminacion Completada.");
    }
}
