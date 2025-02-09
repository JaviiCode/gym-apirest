<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteTablasEntrenamientoRequest;
use App\Http\Requests\IndexTablasEntrenamientoRequest;
use App\Http\Requests\ShowTablasEntrenamientoRequest;
use App\Http\Resources\TablasEntrenamientoCollection;
use App\Http\Resources\TablasEntrenamientoResource;
use App\Models\PlanesEntrenamiento;
use App\Models\TablasEntrenamiento;
use App\Http\Requests\StoreTablasEntrenamientoRequest;
use App\Http\Requests\UpdateTablasEntrenamientoRequest;

class TablasEntrenamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexTablasEntrenamientoRequest $request)
    {
        $tablasEntrenamiento = TablasEntrenamiento::paginate(10);
        return new TablasEntrenamientoCollection($tablasEntrenamiento->loadMissing('planesEntrenamiento','series'));
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
    public function store(StoreTablasEntrenamientoRequest $request)
    {
        if(!PlanesEntrenamiento::find($request->id_plan)){
            return response('Error, Plan no existe no existe.');
        }

        $nuevaTabla = TablasEntrenamiento::create($request->all());
        if($request->has('id_plan')){
            $nuevaTabla->planesEntrenamiento()->sync($request->id_plan);
        }
        return new TablasEntrenamientoResource($nuevaTabla->loadMissing('planesEntrenamiento','series'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowTablasEntrenamientoRequest $request, $id)
    {
        $tabla = TablasEntrenamiento::findOrFail($id);
        if(!$tabla){
            return 'Peticion no encontrada';
        }


        return new TablasEntrenamientoResource($tabla);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TablasEntrenamiento $tablasEntrenamiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTablasEntrenamientoRequest $request, TablasEntrenamiento $tablasEntrenamiento)
    {
        if($request->id_plan && !PlanesEntrenamiento::find($request->id_plan)){
            return response('Error, Plan no existe no existe.');
        };
        $actualizado = $tablasEntrenamiento->update($request->all());
        return response()->json(['success' => $actualizado]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteTablasEntrenamientoRequest $request, $id)
    {
        $tablas = TablasEntrenamiento::find($id);
        $tablas->delete();
        return response("Eliminacion Completada.");
    }
}
