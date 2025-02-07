<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteEjerciciosRequest;
use App\Http\Resources\EjerciciosCollection;
use App\Http\Resources\EjerciciosResource;
use App\Models\Ejercicios;
use App\Http\Requests\StoreEjerciciosRequest;
use App\Http\Requests\UpdateEjerciciosRequest;

class EjerciciosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ejercicio = Ejercicios::paginate(10);
        return new EjerciciosCollection($ejercicio);
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
    public function store(StoreEjerciciosRequest $request)
    {
        $ejercicio = Ejercicios::create($request->all());
        return new EjerciciosResource($ejercicio);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ejercicio = Ejercicios::with('tipoMusculo')->find($id);
        if(!$ejercicio){
            return 'Peticion no encontrada';
        }
        return new EjerciciosResource($ejercicio);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ejercicios $ejercicios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEjerciciosRequest $request, $id)
    {
        $ejercicio = Ejercicios::find($id);
        $actualizado = $ejercicio->update($request->all());
        return response()->json(['success' => $actualizado]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteEjerciciosRequest $request, $id)
    {
        $ejercicio = Ejercicios::find($id);
        $ejercicio->delete();
        return response("Eliminacion Completada.");
    }
}
