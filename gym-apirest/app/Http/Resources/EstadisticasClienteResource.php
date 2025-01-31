<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EstadisticasClienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id_estadistica_cliente,
            'peso' => $this->peso,
            'altura' => $this->altura,
            'grasa_corporal' => $this->grasa_corporal,
            'cintura' => $this->cintura,
            'pecho' => $this->pecho,
            'pierna' => $this->pierna,
            'biceps' => $this->biceps,
            'triceps' => $this->triceps,
        ];
    }
}

