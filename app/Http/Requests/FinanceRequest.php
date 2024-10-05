<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class FinanceRequest extends FormRequest
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
            'numeroTPS' => ['required', 'string', 'max:15', 'regex:/^\d{9}$/'], // Numéro de TPS (format numérique à 9 chiffres)
            'numeroTVQ' => ['required', 'string', 'max:15', 'regex:/^\d{10}$/'], // Numéro de TVQ (format numérique à 10 chiffres)
            'conditionDePaiement' => ['required', 'string', 'max:255'], // Conditions de paiement
            'devise' => ['required', 'string', Rule::in(['CAD', 'USD', 'EUR'])], // Liste prédéterminée de devises
            'modeCommunication' => ['required', 'string', Rule::in(['email', 'téléphone', 'courrier'])], // Liste prédéterminée de modes de communication
        ];
    }
}
