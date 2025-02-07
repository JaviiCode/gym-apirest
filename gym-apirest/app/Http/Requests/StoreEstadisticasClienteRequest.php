<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstadisticasClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $usuario = $this->user();
        return $usuario->tokenCan('admin')||$usuario->tokenCan('estadisticas_cliente');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'peso' => ['required'],
            'altura' => ['required'],
            'grasa_corporal' => ['required'],
            'cintura' => ['required'],
            'pecho' => ['required'],
            'pierna' => ['required'],
            'biceps' => ['required'],
            'triceps' => ['required'],
        ];
    }
}
