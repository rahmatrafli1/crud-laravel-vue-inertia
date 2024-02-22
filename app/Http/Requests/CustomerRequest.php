<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:customers|max:255',
            'phone' => 'required|numeric|unique:customers|max_digits:16|min_digits:12'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Name must required!',
            'name.max' => 'Name maximum 255 character!',
            'email.required' => 'Email must required!',
            'email.email' => 'Email is not valid!',
            'email.unique' => 'Email is already used!',
            'email.max' => 'Email maximum 255 character!',
            'phone.required' => 'Phone must required!',
            'phone.numeric' => 'Phone must number!',
            'phone.unique' => 'Phone is already used!',
            'phone.max_digits' => 'Phone maximum 16 digit!',
            'phone.min_digits' => 'Phone minimum 12 digit!',
        ];
    }
}
