<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanesTablaEntrenamientoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id_plan_tabla,
            'plan_entrenamiento' => new PlanesEntrenamientoResource($this->whenLoaded('planEntrenamiento')),
            'tabla_entrenamiento' => new TablasEntrenamientoResource($this->whenLoaded('tablaEntrenamiento')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
