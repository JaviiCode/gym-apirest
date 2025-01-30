<?php

namespace App\Http\Controllers;

use App\Http\Resources\TipoMusculoCollection;
use App\Models\TipoMusculo;
use App\Http\Requests\StoreTipoMusculoRequest;
use App\Http\Requests\UpdateTipoMusculoRequest;

class TipoMusculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoMusculo $tipoMusculo)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoMusculo $tipoMusculo)
    {
        //
    }
}
