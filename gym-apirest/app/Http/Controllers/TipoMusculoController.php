<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteTipoMusculoRequest;
use App\Http\Requests\IndexTipoMusculoRequest;
use App\Http\Requests\ShowTipoMusculoRequest;
use App\Http\Resources\TipoMusculoCollection;
use App\Http\Resources\TipoMusculoResource;
use App\Models\TipoMusculo;
use App\Http\Requests\StoreTipoMusculoRequest;
use App\Http\Requests\UpdateTipoMusculoRequest;

class TipoMusculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexTipoMusculoRequest $request)
    {
        $tipomusculo = TipoMusculo::paginate(10);
        return new TipoMusculoCollection($tipomusculo);
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
    public function store(StoreTipoMusculoRequest $request)
    {
        $tipoMusculo = TipoMusculo::create($request->all());
        return new TipoMusculoResource($tipoMusculo);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowTipoMusculoRequest $request, $id)
    {
        $tipoMusculo = TipoMusculo::with('ejercicios')->find($id);
        if(!$tipoMusculo){
            return 'Peticion no encontrada';
        }
        return new TipoMusculoResource($tipoMusculo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoMusculo $tipoMusculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipoMusculoRequest $request, TipoMusculo $tipoMusculo)
    {
        $actualizado = $tipoMusculo->update($request->all());
        return response()->json(['success' => $actualizado]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteTipoMusculoRequest $request, $id)
    {
        $musculo = TipoMusculo::find($id);
        $musculo->delete();
        return response("Eliminacion Completada.");
    }
}
