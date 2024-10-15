<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LicenceRequest extends FormRequest
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
        'numeroLicence' => 'required_with:statut,typeLicence,categorie,sousCategorie|nullable',
        'statut' => 'required_with:numeroLicence|nullable',
        'typeLicence' => 'required_with:numeroLicence|nullable',
        'sousCategorie' => 'required_with:numeroLicence|array|nullable',
        'sousCategorie.*' => 'integer|exists:sous_categories,id', // Vérifie chaque sous-catégorie
    ];
}

    
}
