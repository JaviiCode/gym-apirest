<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteSuscripcionesRequest;
use App\Http\Requests\IndexSuscripcionesRequest;
use App\Http\Requests\ShowSuscripcionesRequest;
use App\Http\Resources\SuscripcionesCollection;
use App\Http\Resources\SuscripcionesResource;
use App\Models\Suscripciones;
use App\Http\Requests\StoreSuscripcionesRequest;
use App\Http\Requests\UpdateSuscripcionesRequest;
use App\Models\Usuarios;

class SuscripcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexSuscripcionesRequest $request)
    {
        $suscripciones = Suscripciones::paginate(10);
        return new SuscripcionesCollection($suscripciones);
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
    public function store(StoreSuscripcionesRequest $request)
    {
        if(!Usuarios::find($request->id_usuarios)){
            return response('Error, Usuario no existe.');
        }

        return new SuscripcionesResource(Suscripciones::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowSuscripcionesRequest $request, $id)
    {
        $suscripcion = Suscripciones::find($id);
        if(!$suscripcion){
            return 'Peticion no encontrada';
        }

        $usuario = $request->user();
        if ($usuario->id_usuario != $suscripcion->id_cliente && !Usuarios::usuarioAdmin($usuario) && !Usuarios::usuarioGestor($usuario)) {
            return response('Error. Acceso no disponible', 401);
        }

        return new SuscripcionesResource($suscripcion);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suscripciones $suscripciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSuscripcionesRequest $request, Suscripciones $suscripciones)
    {
        if($request->id_cliente && !Usuarios::find($request->id_usuarios)){
            return response('Error, Usuario no existe.');
        }

        $actualizado = $suscripciones->update($request->all());
        return response()->json(['success' => $actualizado]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteSuscripcionesRequest $request, $id)
    {
        $suscripciones = Suscripciones::find($id);
        $suscripciones->delete();
        return response("Eliminacion Completada.");
    }
}
