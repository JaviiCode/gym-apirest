<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TablasEntrenamientoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id_tabla,
            'semana' => $this->semana,
            'nombre' => $this->nombre,
            'num_ejercicios' => $this->num_ejercicios,
            'num_dias' => $this->num_dias,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'planes_entrenamiento' => PlanesEntrenamientoResource::collection($this->whenLoaded('planesEntrenamiento')),
            'series' => SeriesResource::collection($this->whenLoaded('series')),

        ];
    }
}
