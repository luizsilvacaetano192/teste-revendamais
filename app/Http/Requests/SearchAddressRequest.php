<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchAddressRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return  [
            'zip_code' => 'required|regex:/^\d{5}-?\d{3}$/'
        ]; 
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'regex'    => 'O campo :attribute precisa ter apenas numeros e apenas 8 numeros',
        ];
    }
}
