<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteSeriesRequest;
use App\Http\Requests\IndexSeriesRequest;
use App\Http\Requests\ShowSeriesRequest;
use App\Http\Resources\SeriesCollection;
use App\Http\Resources\SeriesResource;
use App\Models\Series;
use App\Http\Requests\StoreSeriesRequest;
use App\Http\Requests\UpdateSeriesRequest;
use App\Models\TipoSerie;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexSeriesRequest $request)
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
        if(!TipoSerie::find($request->id_tipo_serie)){
            return response('Error, Tipo serie no existe.');
        }
        $nuevaSerie = Series::create($request->all());

        return new SeriesResource($nuevaSerie);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowSeriesRequest $request, $id)
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
        if($request->id_tipo_serie && !TipoSerie::find($request->id_tipo_serie)){
            return response('Error, Tipo serie no existe.');
        }
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
