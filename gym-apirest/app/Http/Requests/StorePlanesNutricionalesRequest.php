<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlanesNutricionalesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $usuario = $this->user();
        return $usuario->tokenCan('admin')||$usuario->tokenCan('planes_nutricionales');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_nutricionista' => ['required'],
            'id_cliente' => ['required'],
            'nombre' => ['required'],
            'recomendaciones_dieta' => ['required'],
            'porcentaje_carbohidratos' => ['required'],
            'porcentaje_proteinas' => ['required'],
            'porcentaje_grasas' => ['required'],
            'porcentaje_fibra' => ['required'],
            'fecha_inicio' => ['required'],
            'fecha_fin' => ['required'],
        ];
    }
}
