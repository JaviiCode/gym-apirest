<?php

namespace App\Http\Controllers;

use App\Http\Resources\TipoSerieCollection;
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoSerie $tipoSerie)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoSerie $tipoSerie)
    {
        //
    }
}
