<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanesEntrenamientoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id_plan,
            'entrenador' => new UsuariosResource($this->whenLoaded('entrenador')),
            'cliente' => new UsuariosResource($this->whenLoaded('cliente')),
            'nombre' => $this->nombre,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
        ];
    }
}
