<?php

namespace App\Http\Controllers;

use App\Http\Resources\EjerciciosCollection;
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ejercicios $ejercicios)
    {
        //
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
    public function update(UpdateEjerciciosRequest $request, Ejercicios $ejercicios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ejercicios $ejercicios)
    {
        //
    }
}
