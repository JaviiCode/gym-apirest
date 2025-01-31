<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PerfilesUsuarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nombre' => $this->nombre,
            'apellido1' => $this->apellido1,
            'apellido2' => $this->apellido2,
            'edad' => $this->edad,
            'direccion' => $this->direccion,
            'telefono' => $this->telefono,
            'foto' => $this->foto,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'usuario' => new TipoUsuarioResource($this->whenLoaded('tipoUsuario')),//poner esto siempre en el show
        ];
    }
}

