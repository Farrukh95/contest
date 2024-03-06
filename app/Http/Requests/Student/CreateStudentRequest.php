<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
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
            'last_name' => ['required', 'string', 'max:50'],
            'first_name' => ['required', 'string', 'max:50'],
            'middle_name' => ['nullable', 'string', 'max:50'],
            'email' => ['required', 'email', 'unique:students,email'],
            'group_id' => ['required', 'numeric', 'exists:groups,id'],
            'quote_type_id' => ['required', 'numeric', 'exists:quote_types,id'],
            'average_exam_score' => ['nullable', 'numeric', 'between:0.00,5.00'],
            'average_subject_score' => ['nullable', 'numeric', 'between:0.00,5.00'],
            'entrance_test_results' => ['nullable', 'numeric', 'between:0,300'],
            'entrance_exam_results' => ['nullable', 'numeric', 'between:0,300'],
            'is_disabled' => ['required', 'boolean'],
        ];
    }
}
