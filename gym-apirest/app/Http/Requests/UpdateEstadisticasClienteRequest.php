<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEstadisticasClienteRequest extends FormRequest
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
            'peso' => ['sometimes', 'required'],
            'altura' => ['sometimes', 'required'],
            'grasa_corporal' => ['sometimes', 'required'],
            'cintura' => ['sometimes', 'required'],
            'pecho' => ['sometimes', 'required'],
            'pierna' => ['sometimes', 'required'],
            'biceps' => ['sometimes', 'required'],
            'triceps' => ['sometimes', 'required'],
        ];
    }
}
