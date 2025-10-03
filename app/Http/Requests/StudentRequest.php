<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name' => 'required|alpha',
            'description' => 'nullable',
            'department_id' => 'numeric',
            'image' => 'nullable|image'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "please enter student name",
            'name.alpha' => "please enter only letters for student name",
           
        ];
    }
}
