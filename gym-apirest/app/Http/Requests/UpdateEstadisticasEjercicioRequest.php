<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEstadisticasEjercicioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $usuario = $this->user();
        return $usuario->tokenCan('admin')||$usuario->tokenCan('estadisticas_ejercicio');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_ejercicio' => 'sometimes|exists:ejercicios,id_ejercicio',
            'num_sesiones' => 'sometimes|integer|min:0',
            'tiempo_total' => 'sometimes|numeric|min:0',
            'duracion_media' => 'sometimes|numeric|min:0',
            'sets_completados' => 'sometimes|integer|min:0',
            'volumen_total' => 'sometimes|numeric|min:0',
            'repeticiones_totales' => 'sometimes|integer|min:0',
            'fecha_entrenamiento' => 'sometimes|date',
        ];
    }
}
