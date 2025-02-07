<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteTipoSerieRequest;
use App\Http\Resources\TipoSerieCollection;
use App\Http\Resources\TipoSerieResource;
use App\Models\TipoSerie;
use App\Http\Requests\StoreTipoSerieRequest;
use App\Http\Requests\UpdateTipoSerieRequest;

class TipoSerieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiposerie = TipoSerie::paginate(10);
        return new TipoSerieCollection($tiposerie);
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
    public function store(StoreTipoSerieRequest $request)
    {
        $nuevoTipo = TipoSerie::create($request->all());
        return new TipoSerieResource($nuevoTipo);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tipo = TipoSerie::findOrFail($id);
        if(!$tipo){
            return 'Peticion no encontrada';
        }
        return new TipoSerieResource($tipo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoSerie $tipoSerie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoSerieRequest $request, TipoSerie $tipoSerie)
    {
        $actualizado = $tipoSerie->update($request->all());
        return response()->json(['success' => $actualizado]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteTipoSerieRequest $request, $id)
    {
        $serie = TipoSerie::find($id);
        $serie->delete();
        return response("Eliminacion Completada.");
    }
}
