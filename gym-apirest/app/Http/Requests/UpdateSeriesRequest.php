<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSeriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $usuario = $this->user();
        return $usuario->tokenCan('admin')||$usuario->tokenCan('series');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'repeticiones_min' => 'sometimes|integer',
            'repeticiones_max' => 'sometimes|integer',
            'peso' => 'sometimes|numeric',
            'duracion' => 'sometimes|numeric',
            'descanso' => 'sometimes|numeric',
            'id_ejercicio' => 'sometimes|exists:ejercicios,id_ejercicio',
            'id_tabla' => 'sometimes|exists:tablasentrenamiento,id_tabla',
            'id_tipo_serie' => 'sometimes|exists:tiposerie,id_tipo_serie',
        ];
    }
}
