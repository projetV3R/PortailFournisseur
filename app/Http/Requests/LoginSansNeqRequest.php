<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginSansNeqRequest extends FormRequest
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
            'adresse_courriel' => [
                'required',
                'string',
                'email', // Vérifie que le champ est une adresse email valide
                'max:255', // Limite à 255 caractères
            ],
            'motDePasse' => [
                'required',
                'string',
                'min:7',
                'max:12',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{7,12}$/', // Doit contenir au moins une minuscule, une majuscule, un chiffre, un caractère spécial
            ],
        ];
    }
}
