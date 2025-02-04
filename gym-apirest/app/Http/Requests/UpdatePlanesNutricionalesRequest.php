<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlanesNutricionalesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_nutricionista' => ['sometimes', 'required'],
            'id_cliente' => ['sometimes', 'required'],
            'nombre' => ['sometimes', 'required'],
            'recomendaciones_dieta' => ['sometimes', 'required'],
            'porcentaje_carbohidratos' => ['sometimes', 'required'],
            'porcentaje_proteinas' => ['sometimes', 'required'],
            'porcentaje_grasas' => ['sometimes', 'required'],
            'porcentaje_fibra' => ['sometimes', 'required'],
            'fecha_inicio' => ['sometimes', 'required'],
            'fecha_fin' => ['sometimes', 'required'],
        ];
    }
}
