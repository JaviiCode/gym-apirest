<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlanesEntrenamientoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $usuario = $this->user();
        return $usuario->tokenCan('admin')||$usuario->tokenCan('planes_entrenamiento');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_entrenador' => ['sometimes', 'required'],
            'id_cliente' => ['sometimes', 'required'],
            'nombre' => ['sometimes', 'required'],
            'fecha_inicio' => ['sometimes', 'required'],
            'fecha_fin' => ['sometimes', 'required'],
        ];
    }
}
