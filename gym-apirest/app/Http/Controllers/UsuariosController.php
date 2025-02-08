<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteUsuariosRequest;
use App\Http\Resources\UsuariosCollection;
use App\Http\Resources\UsuariosResource;
use App\Models\TipoUsuario;
use App\Models\Usuarios;
use DateTime;
use App\Http\Requests\StoreUsuariosRequest;
use App\Http\Requests\UpdateUsuariosRequest;

class UsuariosController extends Controller
{
    /**
 * @SWG\Get(
 *     path="/api/javiigm/usuarios",
 *     summary="Obtener Lista Usuarios",
 *     tags={"Usuarios"},
 *     @SWG\Response(response=200, description="Successful operation"),
 *     @SWG\Response(response=400, description="Invalid request")
 * )
 */
    public function index()
    {
        $usuarios = Usuarios::paginate(10);
        return new UsuariosCollection(
            $usuarios->loadMissing(

                'perfilUsuario',
                'suscripciones',
                'estadisticaCliente',
                'planesComoEntrenador',
                'planesComoCliente',
                'planesNutricionalesComoNutricionista',
                'planesNutricionalesComoCliente',
                'planesComoEntrenador',
                'planesComoCliente'
            )
        );
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
    public function store(StoreUsuariosRequest $request)
    {
        if(!TipoUsuario::find($request->id_tipo_usuario)){
            return response('Error, Tipo usuario no existe no existe.');
        }
        $usuario = Usuarios::create($request->all());
        $toke = $usuario->createToken('clienteToken');
        $usuario->token = $toke->plainTextToken;
        $usuario->id_tipo_usuario = '5';
        $fecha = date("Y-m-d H:i:s");
        $usuario->fecha_registro = $fecha;
        $usuario->save();
        return new UsuariosResource($usuario);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuarios = Usuarios::find($id);

        if(!$usuarios){
            return 'Usuario no existe';
        }
        return new UsuariosResource(
            $usuarios->loadMissing(
                'perfilUsuario',
                'suscripciones',
                'estadisticaCliente',
                'planesComoEntrenador',
                'planesComoCliente',
                'planesNutricionalesComoNutricionista',
                'planesNutricionalesComoCliente',
                'planesComoEntrenador',
                'planesComoCliente'
            )
        );


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuariosRequest $request, $id)
    {
        if($request->id_tipo_usuario && !TipoUsuario::find($request->id_tipo_usuario)){
            return response('Error, Tipo usuario no existe no existe.');
        }
        $usuarios = Usuarios::find($id);
        $usuarios->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteUsuariosRequest $request, $id)
    {
        $usuarios = Usuarios::find($id);
        $usuarios->delete();
        return response("Eliminacion Completada.");
    }

    public function usuarioInfo($id){
        $usuario = Usuarios::find($id);
        $usuario->usuarioInfo();

        return new UsuariosResource($usuario);
    }
}
