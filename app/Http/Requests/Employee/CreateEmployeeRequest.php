<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => ['required', 'email', 'unique:employees'],
            'password' => ['required', 'confirmed', 'min:6'],
            'role_id' => ['array', 'required'],
            'role_id.*' => ['numeric']
        ];
    }

    public function messages()
    {
        return [
            'role_id.*' => 'Select a role'
        ];
    }
}
