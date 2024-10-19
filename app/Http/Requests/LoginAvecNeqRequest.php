<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginAvecNeqRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'motDePasse' => [
                'required',
                'string',
                'min:7',
                'max:12',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{7,12}$/', // Doit contenir au moins une minuscule, une majuscule, un chiffre, un caractère spécial
            ],
            'numeroEntreprise' => [
                'required',
                'string',
                'size:10', // Doit avoir exactement 10 caractères
                'regex:/^(11|22|33|88)[4-9]\d{7}$/', // Doit commencer par 11, 22, 33 ou 88, suivi d’un chiffre de 4 à 9, et les 7 autres chiffres
            ],
        ];
    }
}
