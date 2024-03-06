<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'contest_id' => ['required', 'exists:contests,id'],
           'module_priority_1' => ['required', 'exists:modules,id'],
           'module_priority_2' => ['required', 'exists:modules,id', Rule::notIn([$this->input('module_priority_1')])],
        ];
    }
}
