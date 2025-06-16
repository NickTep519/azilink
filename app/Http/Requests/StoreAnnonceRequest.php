<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnnonceRequest extends FormRequest
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
        if ($this->type === true) {

            return [
                'title' => ['required', 'min:4', 'string'],
                'description' => ['required', 'min:8', 'string'] , 
                'kg' => ['required', 'integer'],
                'price' => ['required', 'integer'],
                'starts_city' => ['required', 'string'],
                'ends_city' => ['required', 'string'],
                'm_transport' => ['required', 'string'],
                'company' => ['string', 'nullable'],
                'starts_at' => ['required', 'date'],
                'ends_at' => ['required', 'date'] , 
                'type' => ['required'],
                'status' => ['nullable']
            ] ;
        } else {

            return [
                'title' => ['required', 'min:4', 'string'],
                'description' => ['required', 'min:8', 'string'] ,
                'kg' => ['required', 'integer'],
                'price' => ['nullable', 'integer'],
                'starts_city' => ['required', 'string'],
                'ends_city' => ['required', 'string'],
                'm_transport' => ['required', 'string'],
                'company' => ['nullable', 'string'],
                'starts_at' => ['nullable', 'date', 'after:today'],
                'ends_at' => [ 'nullable', 'date', 'after:today'] , 
                'type' => ['required'],
                'status' => ['nullable']

            ] ; 
        }
    }
}
