<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
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
            'contacts' => ['required', 'array'],
            'prenom.*' => [
                'required',
                'string',
                'max:32',
                'regex:/^[a-zA-ZÀ-ÿ\'\- ]+$/u'
            ],

            'nom.*' => [
                'required',
                'string',
                'max:32',
                'regex:/^[a-zA-ZÀ-ÿ\'\- ]+$/u'
            ],

            'fonction.*' => [
                'required',
                'string',
                'max:32'
            ],

            'email.*' => [
                'required',
                'string',
                'email',
                'max:64'
            ],

            'ligne.*' => [
                'required',
                'string',
                Rule::in(['Bureau', 'Télécopieur', 'Cellulaire'])
            ],

            'numeroTelephone.*' => [
                'required',
                'string',
                'size:12',
                'regex:/^\d{3}-\d{3}-\d{4}$/'
            ],

            'poste.*' => [
                'nullable',
                'string',
                'max:6',
                'regex:/^\d+$/'
            ],
        ];
    }
}
