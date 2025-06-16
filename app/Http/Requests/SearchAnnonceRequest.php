<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchAnnonceRequest extends FormRequest
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
            'price' => ['numeric','gt:0', 'nullable'],
            'kg' => ['numeric', 'gt:0', 'nullable'],
            'starts_city' => ['string', 'nullable'],
            'ends_city' => ['string', 'nullable'],
        ];
    }
}
