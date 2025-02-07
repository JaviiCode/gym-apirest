<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstadisticasEjercicioRequest extends FormRequest
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
            'id_ejercicio' => 'required|exists:ejercicios,id_ejercicio',
            'num_sesiones' => 'required|integer|min:0',
            'tiempo_total' => 'required|numeric|min:0',
            'duracion_media' => 'required|numeric|min:0',
            'sets_completados' => 'required|integer|min:0',
            'volumen_total' => 'required|numeric|min:0',
            'repeticiones_totales' => 'required|integer|min:0',
            'fecha_entrenamiento' => 'required|date',
        ];
    }
}
