<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePerfilesUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $usuario = $this->user();
        return $usuario->tokenCan('admin')||$usuario->tokenCan('perfiles');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => ['sometimes', 'required'],
            'apellido1' => ['sometimes', 'required'],
            'apellido2' => ['sometimes', 'required'],
            'edad' => ['sometimes', 'required'],
            'direccion' => ['sometimes', 'required'],
            'telefono' => ['sometimes', 'required'],
            'foto' => ['sometimes', 'required'],
            'fecha_nacimiento' => ['sometimes', 'required'],
        ];
    }
}
