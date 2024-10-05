<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'numeroCivique' => [
                'required',
                'string',
                'max:8',
                'regex:/^[a-zA-Z0-9]+$/u'
            ],

            'rue' => [
                'required',
                'string',
                'max:64',
                'regex:/^[a-zA-Z0-9À-ÿ\'\- ]+$/u'
            ],

            'bureau' => [
                'nullable',
                'string',
                'max:8',
                'regex:/^[a-zA-Z0-9]+$/u'
            ],

            'municipalite' => [
                'required',
                'string',
                'max:64',
            ],

            'codePostale' => [
                'required',
                'string',
                'max:6',
                'regex:/^[a-zA-Z0-9]+$/u'
            ],

            'codeRegionAdministrative' => [
                'required',
                'string',
                'size:2',
                'regex:/^\d{2}$/',
                Rule::in(['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17'])
            ],

            'regionAdministrative' => [
                'required_if:province,Québec',
                'string',
                Rule::in(['Bas-Saint-Laurent', 'Saguenay–Lac-Saint-Jean', 'Capitale-Nationale'])
            ],

            'siteWeb' => [
                'nullable',
                'string',
                'url',
                'max:64'
            ],
            'ligne.0' => [
                'required',
                'string',
                Rule::in(['Bureau', 'Télécopieur', 'Cellulaire'])
            ],
            'poste.0' => [
                'required',
                'nullable',
                'string',
                'max:6',
                'regex:/^\d+$/',

            ],
            'numeroTelephone.0' => [
                'required',
                'string',
                'size:12',
                'regex:/^\d{3}-\d{3}-\d{4}$/'
            ],
            'ligne.*' => 'nullable',
            'poste.*' => 'nullable',
            'numeroTelephone.*' => 'nullable',
        ];
    }
}
