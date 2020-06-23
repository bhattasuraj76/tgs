<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => ['required', 'email', Rule::unique('employees', 'email')->ignore($this->segment(3))],
            'password' => ['nullable', 'confirmed', 'min:6'],
            'role_id' => ['array', 'required'],
            'role_id.*' => ['numeric']
        ];
    }

    public function messages()
    {
        return [
            'role_id.*' => 'You must select a role'
        ];
    }
}
