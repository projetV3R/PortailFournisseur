<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitServiceRequest extends FormRequest
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
            'nature' => 'required',
            'codeCategorie' => 'required_with:nature,categorie',
            'categorie' => 'required_with:nature,codeCategorie',
            'codeUNSPSC' => 'required_with:nature,codeCategorie,categorie,description',
            'description' => 'required_with:nature,codeCategorie,categorie,codeUNSPSC',
            'details' => 'required_with:nature,codeCategorie,categorie,codeUNSPSC,description',
        ];
    }
}
