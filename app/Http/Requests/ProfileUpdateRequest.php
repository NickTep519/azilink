<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        /*if($this->regle ==1) {
            
            return [
                
                'name' => ['nullable', 'string', 'max:255'],
                'first_name' => ['nullable', 'string', 'max:255'],
                'phone' => ['nullable', 'string', 'max:255'],
                'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
                'adress' => ['required', 'string', 'max:255'],
                'date_of_birth' => ['required', 'date'],
                'sex' => ['required', 'string', 'max:255'],
                'bio' => ['nullable', 'string'],
                'city' => ['nullable', 'string'],
                'pays' => ['nullable', 'string', 'max:250'],
                'site' => ['nullable', 'string', 'max:500'],
                'nationalite' => ['required', 'string', 'max:255'],
                'link_facebook' => ['nullable', 'string'],
                'link_insta' => ['nullable', 'string'],
                'link_x' => ['nullable', 'string'],
            ] ;
            
        }*/
        
        return [
            'pseudo' => ['nullable', 'string', 'max:255'],
            'name' => ['nullable', 'string', 'max:255'],
            'first_name' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'adress' => ['nullable', 'string', 'max:255'],
            'date_of_birth' => ['nullable', 'date'],
            'sex' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'bio' => ['nullable', 'string'],
            'city' => ['nullable', 'string', 'max:500'],
            'pays' => ['nullable', 'string', 'max:250'],
            'site' => ['nullable', 'string', 'max:500'],
            'accord' => ['nullable', 'string'], 
            'country_code' => ['nullable', 'string'], 
            'nationalite' => ['nullable', 'string', 'max:255'],
            'link_facebook' => ['nullable', 'string'],
            'link_x' => ['nullable', 'string'],
            'link_insta' => ['nullable', 'string']
        ];
    }
}
