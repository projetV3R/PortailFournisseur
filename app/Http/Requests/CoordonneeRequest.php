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
            'province' => [
                'required',
                'string',
                'max:64',
            ],

            'bureau' => [
                'nullable',
                'string',
                'max:8',
                'regex:/^[a-zA-Z0-9]+$/u'
            ],

            'codePostale' => [
                'required',
                'string',
                'max:6',
                'regex:/^[a-zA-Z0-9]+$/u'
            ],

            'siteWeb' => [
                'nullable',
                'string',
                'url',
                'max:64'
            ],
            'ligne' => ['required', 'array'], 
            'ligne.*.type' => [
                'required',
                'string',
                Rule::in(['Bureau', 'Télécopieur', 'Cellulaire']), 
            ],
            'ligne.*.numeroTelephone' => [
                'required',
                'string',
                'regex:/^\d{3}-\d{3}-\d{4}$/', 
            ],
            'ligne.*.poste' => [
                'nullable',
                'string',
                'max:6',
                'regex:/^\d+$/', 
            ]
        ];
    if ($this->input('province') === 'Québec') {
        $rules['municipalite'] = ['required', 'string', 'max:64'];
        $rules['regionAdministrative'] = ['required', 'string'];
    } else {
        $rules['municipaliteInput'] = ['required', 'string', 'max:64'];
    }

    return $rules;
    }
}
