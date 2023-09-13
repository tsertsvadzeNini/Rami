<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function validationData()
    {
        return array_filter($this->all(), function ($value) {
            return $value !== null;
        });
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username'       => 'nullable|min:3|max:255|unique:users',
            'email'          => 'nullable|email|max:255|unique:users',
            'password'       => 'nullable|min:3|max:255',
            'thumbnail'      => 'nullable'
        ];
    }
}
