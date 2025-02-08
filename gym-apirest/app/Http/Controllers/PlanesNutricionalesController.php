<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeletePlanesNutricionalesRequest;
use App\Http\Requests\IndexPlanesNutricionalesRequest;
use App\Http\Requests\ShowPlanesNutricionalesRequest;
use App\Http\Resources\PlanesNutricionalesCollection;
use App\Http\Resources\PlanesNutricionalesResource;
use App\Models\PlanesNutricionales;
use App\Http\Requests\StorePlanesNutricionalesRequest;
use App\Http\Requests\UpdatePlanesNutricionalesRequest;
use App\Models\Usuarios;

class PlanesNutricionalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexPlanesNutricionalesRequest $request)
    {
        $planesNutricionales = PlanesNutricionales::paginate(10);
        return new PlanesNutricionalesCollection($planesNutricionales);
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
    public function store(StorePlanesNutricionalesRequest $request)
    {
        $cliente = Usuarios::find($request->id_cliente);
        $nutricionista = Usuarios::find($request->id_nutricionista);
        if(!Usuarios::find($request->id_cliente) || !Usuarios::usuarioCliente($cliente) || !Usuarios::usuarioNutricionista($nutricionista) || !Usuarios::find($request->id_nutricionista)){
            return response('Error, Usuario invalido.');
        }

        $nuevoPlan = PlanesNutricionales::create($request->all());
        return new PlanesNutricionalesResource($nuevoPlan);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowPlanesNutricionalesRequest $request, $id)
    {
        $planNutricional = PlanesNutricionales::findOrFail($id);
        if (!$planNutricional) {
            return 'Peticion no encontrada';
        }
        $usuario = $request->user();
        if ($usuario->id_usuario != $planNutricional->id_cliente && !Usuarios::usuarioAdmin($usuario) && !Usuarios::usuarioNutricionista($usuario)) {
            return response('Error. Acceso no disponible', 401);
        }
        if(Usuarios::usuarioEntrenador($usuario) && $usuario->id_usuario != $planNutricional->id_nutricionista){
            return response('Error. Acceso no disponible', 401);
        }

        return new PlanesNutricionalesResource($planNutricional->loadMissing('nutricionista', 'cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlanesNutricionales $planesNutricionales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlanesNutricionalesRequest $request, PlanesNutricionales $planesNutricionales)
    {
        $cliente = Usuarios::find($request->id_cliente);
        $nutricionista = Usuarios::find($request->id_nutricionista);

        if($request->id_cliente && !Usuarios::find($request->id_cliente) ||  $request->id_cliente && !Usuarios::usuarioCliente($cliente) || $request->id_cliente && !Usuarios::usuarioNutricionista($nutricionista) || $request->id_nutricionista && !Usuarios::find($request->id_nutricionista)){
            return response('Error, Usuario invalido.');
        }
        $actualizado = $planesNutricionales->update($request->all());
        return response()->json(['success' => $actualizado]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeletePlanesNutricionalesRequest $request, $id)
    {
        $plan = PlanesNutricionales::find($id);
        $plan->delete();
        return response("Eliminacion Completada.");
    }
}
