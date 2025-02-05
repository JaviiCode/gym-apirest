<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EstadisticasEjercicioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_estadistica' => $this->id_estadistica,
            'num_sesiones' => $this->num_sesiones,
            'tiempo_total' => $this->tiempo_total,
            'duracion_media' => $this->duracion_media,
            'sets_completados' => $this->sets_completados,
            'volumen_total' => $this->volumen_total,
            'repeticiones_totales' => $this->repeticiones_totales,
            'fecha_entrenamiento' => $this->fecha_entrenamiento,
            'ejercicio' => new EjerciciosResource($this->whenLoaded('ejercicio')),
        ];
    }
}
