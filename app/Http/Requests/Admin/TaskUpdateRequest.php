<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
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
            'title' => ['required'],
            'details' => ['nullable'],
            'project_name' => [ 'required' ,'numeric', 'exists:projects,id'],
            'status' => [ 'required' , 'in:Pending,Done'],
            'deadline' => [ 'required' , 'date', 'after:yesterday'],
        ];
    }
}
