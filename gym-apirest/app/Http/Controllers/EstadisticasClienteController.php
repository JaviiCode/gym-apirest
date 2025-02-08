<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteEstadisticasClienteRequest;
use App\Http\Requests\IndexEstadisticasClienteRequest;
use App\Http\Requests\ShowEstadisticasClienteRequest;
use App\Http\Resources\EstadisticasClienteCollection;
use App\Http\Resources\EstadisticasClienteResource;
use App\Models\EstadisticasCliente;
use App\Http\Requests\StoreEstadisticasClienteRequest;
use App\Http\Requests\UpdateEstadisticasClienteRequest;
use App\Models\Usuarios;

class EstadisticasClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexEstadisticasClienteRequest $request)
    {
        $estadisticasCliente = EstadisticasCliente::paginate(10);
        return new EstadisticasClienteCollection($estadisticasCliente);
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
    public function store(StoreEstadisticasClienteRequest $request)
    {
        if(!Usuarios::find($request->id_cliente)){
            return response('Error, Usuario no existe no existe.');
        }

        $nuevaEstadisticas = EstadisticasCliente::create($request->all());
        return new EstadisticasClienteResource($nuevaEstadisticas);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowEstadisticasClienteRequest $request, $id)
    {
        $estadisticaCliente = EstadisticasCliente::find($id);
        if(!$estadisticaCliente){
            return 'Peticion no encontrada';
        }
        $usuario = $request->user();
        if($usuario->id_usuario != $estadisticaCliente->id_cliente && Usuarios::usuarioCliente($usuario)){
            return response('Error. Acceso no disponible', 401);
        }
        return new EstadisticasClienteResource($estadisticaCliente);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EstadisticasCliente $estadisticasCliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEstadisticasClienteRequest $request, EstadisticasCliente $id)
    {
        if($request->id_cliente && !Usuarios::find($request->id_cliente)){
            return response('Error, Usuario no existe no existe.');
        }
        $estadisticaCliente = EstadisticasCliente::find($id);
        $estadisticaCliente->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteEstadisticasClienteRequest $request, $id)
    {
        $estadistica = EstadisticasCliente::find($id);
        $estadistica->delete();
        return response("Eliminacion Completada.");
    }
}
