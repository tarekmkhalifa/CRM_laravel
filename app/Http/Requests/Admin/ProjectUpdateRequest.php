<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectUpdateRequest extends FormRequest
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
            'title' => ['required', Rule::unique('projects', 'title')->ignore($this->project)],
            'description' => ['nullable'],
            'user_name' => [ 'required' ,'numeric', 'exists:users,id'],
            'client_name' => [ 'required' ,'numeric', 'exists:clients,id'],
            'status' => [ 'required', 'in:Pending,Done'],
            'deadline' => [ 'required' , 'date', 'after:yesterday'],
        ];
    }
}
