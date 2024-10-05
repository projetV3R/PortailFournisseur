<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IdentificationRequest extends FormRequest
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
            'email' => [
                'required',
                'string',
                'email',
                'max:64',
                'unique:fiche_fournisseurs,adresse_courriel',
            ],
            'password' => [
                'required',
                'string',
                'min:7',
                'max:12',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{7,12}$/',
                'confirmed',
            ],
            'password_confirmation' => [
                'required'
            ],
            'numeroEntreprise' => [
                'required',
                'string',
                'size:10',
                'regex:/^(11|22|33|88)[4-9]\d{7}$/',
                'unique:fiche_fournisseurs,neq',
            ],
            'nomEntreprise' => [
                'required',
                'string',
                'max:64'
            ],
        ];
    }

    /**
     * 
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'password.regex' => 'Le mot de passe doit contenir entre 7 et 12 caractères, avec au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.',
            'numeroEntreprise.regex' => 'Le numéro d\'entreprise doit commencer par 11, 22, 33 ou 88, suivi de 8 chiffres.',

        ];
    }
}
