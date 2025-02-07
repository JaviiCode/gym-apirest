<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTablasEntrenamientoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $usuario = $this->user();
        return $usuario->tokenCan('admin')||$usuario->tokenCan('tablas_entrenamieto');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'semana' => 'required|integer',
            'nombre' => 'required|string|max:255',
            'num_ejercicios' => 'required|integer',
            'num_dias' => 'required|integer',
            'id_plan' => ['sometimes','required'],
        ];
    }
}
