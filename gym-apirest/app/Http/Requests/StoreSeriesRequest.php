<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSeriesRequest extends FormRequest
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
            'repeticiones_min' => 'required|integer',
            'repeticiones_max' => 'required|integer',
            'peso' => 'required|numeric',
            'duracion' => 'required|numeric',
            'descanso' => 'required|numeric',
            'id_ejercicio' => 'required|exists:ejercicios,id_ejercicio',
            'id_tabla' => 'required|exists:tablasentrenamiento,id_tabla',
            'id_tipo_serie' => 'required|exists:tiposerie,id_tipo_serie',
        ];
    }
}
