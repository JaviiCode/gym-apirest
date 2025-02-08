<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeletePlanesEntrenamientoRequest;
use App\Http\Requests\IndexPlanesEntrenamientoRequest;
use App\Http\Requests\ShowPlanesEntrenamientoRequest;
use App\Http\Resources\PlanesEntrenamientoCollection;
use App\Http\Resources\PlanesEntrenamientoResource;
use App\Models\PlanesEntrenamiento;
use App\Http\Requests\StorePlanesEntrenamientoRequest;
use App\Http\Requests\UpdatePlanesEntrenamientoRequest;
use App\Models\TablasEntrenamiento;
use App\Models\Usuarios;

class PlanesEntrenamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexPlanesEntrenamientoRequest $request)
    {
        $plan = PlanesEntrenamiento::paginate(10);
        return new PlanesEntrenamientoCollection($plan->loadMissing('entrenador', 'cliente', 'tablasEntrenamiento'));
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
    public function store(StorePlanesEntrenamientoRequest $request)
    {
        $cliente = Usuarios::find($request->id_cliente);
        $entrenador = Usuarios::find($request->id_entrenador);
        if(!Usuarios::find($request->id_cliente)|| !Usuarios::usuarioCliente($cliente) || !Usuarios::usuarioEntrenador($entrenador) || !Usuarios::find($request->id_entrenador)){
            return response('Error, Usuario invalido.', 205);
        }
        $plan = PlanesEntrenamiento::create($request->all());
        if($request->has('id_tabla')){
            $plan->tablasEntrenamiento()->sync($request->id_tabla);
        }
        return new PlanesEntrenamientoResource($plan->loadMissing('tablasEntrenamiento'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowPlanesEntrenamientoRequest $request, $id)
    {
        $plan = PlanesEntrenamiento::find($id);
        if(!$plan){
            return 'Peticion no encontrada';
        }
        $usuario = $request->user();

        if ($usuario->id_usuario != $plan->id_cliente && !Usuarios::usuarioAdmin($usuario) && !Usuarios::usuarioEntrenador($usuario)) {
            return response('Error. Acceso no disponible', 401);
        }

        if(Usuarios::usuarioEntrenador($usuario) && $usuario->id_usuario != $plan->id_entrenador){
            return response('Error. Acceso no disponible', 401);
        }

        return new PlanesEntrenamientoResource($plan->loadMissing('entrenador', 'cliente','tablasEntrenamiento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlanesEntrenamiento $planesEntrenamiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlanesEntrenamientoRequest $request, PlanesEntrenamiento $planesEntrenamiento)
    {
        $cliente = Usuarios::find($request->id_cliente);
        $entrenador = Usuarios::find($request->id_entrenador);

        if($request->id_cliente && Usuarios::find($request->id_cliente) || $request->id_cliente && !Usuarios::usuarioCliente($cliente) || $request->id_entrenador && !Usuarios::usuarioEntrenador($entrenador) || Usuarios::find($request->id_entrenador)){
            return response('Error, Usuario invalido.', 205);
        }
        $actualizado = $planesEntrenamiento->update($request->all());
        return response()->json(['success' => $actualizado]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeletePlanesEntrenamientoRequest $request, $id)
    {
        $plan = PlanesEntrenamiento::find($id);
        $plan->delete();
        return response("Eliminacion Completada.");
    }
}
