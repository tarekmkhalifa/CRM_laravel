<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3'],
            'email' => ['required','email', Rule::unique('clients', 'email')->ignore($this->client)],
            'phone' => ['required', 'digits:11', Rule::unique('clients', 'phone')->ignore($this->client)],
            'image' => ['nullable', 'image', 'mimes:png,jpg,jpeg']
        ];
    }
}
