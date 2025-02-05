<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TipoMusculoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id_tipo_musculo,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'ejercicios' => EjerciciosResource::collection($this->whenLoaded('ejercicios')),
        ];
    }
}
