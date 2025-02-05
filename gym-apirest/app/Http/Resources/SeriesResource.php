<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id_serie,
            'repeticiones_min' => $this->repeticiones_min,
            'repeticiones_max' => $this->repeticiones_max,
            'peso' => $this->peso,
            'duracion' => $this->duracion,
            'descanso' => $this->descanso,
            'ejercicio' => new EjerciciosResource($this->whenLoaded('ejercicio')),
            'tabla_entrenamiento' => new TablasEntrenamientoResource($this->whenLoaded('tablaEntrenamiento')),
            'tipo_serie' => new TipoSerieResource($this->whenLoaded('tipoSerie')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
