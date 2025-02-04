<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsuariosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id_usuario,
            'email' => $this->email,
            //'token' => $this->token,
            //'clave' => $this->clave,
            'fecha_registro' => $this->fecha_registro,
            'perfil' => PerfilesUsuarioResource::collection($this->whenLoaded('perfilUsuario')),
            'suscripciones' => SuscripcionesResource::collection($this->whenLoaded('Suscripciones')),//poner esto siempre en el show
            'estadisticaCliente' => EstadisticasClienteResource::collection($this->whenLoaded('estadisticaCliente')),
            'planesComoEntrenador' => PlanesEntrenamientoResource::collection($this->whenLoaded('planesComoEntrenador')),
            'planesComoCliente' => PlanesEntrenamientoResource::collection($this->whenLoaded('planesComoCliente')),
            'planesNutricionalesComoCliente' => PlanesNutricionalesResource::collection($this->whenLoaded('planesNutricionalesComoCliente')),
            'planesNutricionalesComoNutricionista' => PlanesNutricionalesResource::collection($this->whenLoaded('planesNutricionalesComoNutricionista')),

        ];
    }
}
