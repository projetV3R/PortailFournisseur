<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoordonneeRequest extends FormRequest
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
            'numeroCivique' => 'required',
            'rue' => 'required',
            'bureau' => 'required',
            'municipalite' => 'required',
            'codePostale' => 'required',
            'codeRegionAdministrative' => 'required',
            'regionAdministrative' => 'required',
            'siteWeb' => 'required',
            'ligne' => 'required',
            'poste' => 'required',
            'numeroTelephone' => 'required',
        ];
    }
}
