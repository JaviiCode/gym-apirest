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
            'token' => $this->token,
            'clave' => $this->clave,
            'fecha_registro' => $this->fecha_registro,
            'usuario' => new TipoUsuarioResource($this->whenLoaded('tipoUsuario')),//poner esto siempre en el show
        ];
    }
}
