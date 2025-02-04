<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanesNutricionalesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id_plan_nutricional,
            'nombre' => $this->nombre,
            'recomendaciones_dieta' => $this->recomendaciones_dieta,
            'porcentaje_carbohidratos' => $this->porcentaje_carbohidratos,
            'porcentaje_proteinas' => $this->porcentaje_proteinas,
            'porcentaje_grasas' => $this->porcentaje_grasas,
            'porcentaje_fibra' => $this->porcentaje_fibra,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'nutricionista' => new UsuariosResource($this->whenLoaded('nutricionista')),
            'cliente' => new UsuariosResource($this->whenLoaded('cliente')),
        ];
    }
}
