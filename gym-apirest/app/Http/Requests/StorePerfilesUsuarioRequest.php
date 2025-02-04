<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePerfilesUsuarioRequest extends FormRequest
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
            'nombre' => ['required'],
            'apellido1' => ['required'],
            'apellido2' => ['required'],
            'edad' => ['required'],
            'direccion' => ['required'],
            'telefono' => ['required'],
            'foto' => ['required'],
            'fecha_nacimiento' => ['required'],
        ];
    }
}
