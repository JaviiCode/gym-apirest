<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEjerciciosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $usuario = $this->user();
        return $usuario->tokenCan('admin')||$usuario->tokenCan('ejercicios');

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'id_tipo_musculo' => 'required|exists:tiposmusculo,id_tipo_musculo',
            'descripcion' => 'nullable|string',
        ];
    }
}
