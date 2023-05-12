<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
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
            'title' => ['required', 'unique:projects'],
            'description' => ['nullable'],
            'user_name' => [ 'required' ,'numeric', 'exists:users,id'],
            'client_name' => [ 'required' ,'numeric', 'exists:clients,id'],
            'deadline' => [ 'required' , 'date', 'after:yesterday'],
        ];
    }
}
