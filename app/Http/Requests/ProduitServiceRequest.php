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
            'codeCategorie' => 'required',
            'categorie' => 'required',
            'codeUNSPSC' => 'required',
            'description' => 'required',
            'details' => 'required',
        ];
    }
}
