<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveAddressRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return  [
            'zip_code'     => 'required|regex:/^\d{5}-?\d{3}$/',
            'street'       => 'required|between:3,255',
            'neighborhood' => 'required|between:3,255',
            'city'         => 'required|between:3,255',
            'state'        => 'required|size:2',
        ]; 
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'between'  => 'O campo :attribute de conter de 3 a 255 caracteres',
            'regex'    => 'O campo :attribute precisa ter apenas numeros e apenas 8 numeros',
            'size'     => 'O campo :attribute deve conter no maximo 2 caracteres'
        ];
    }
}
