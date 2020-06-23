<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'site_name' => 'required',
            'primary_email' => 'required',
            'phone1' => 'required',
            'office_start_time' => 'required',
            'office_end_time' =>  'required',
            'break_start_time' => 'required',
            'break_end_time' => 'required',
            'max_quotas' => 'required',
            'allocation_time' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'site_name.required' => 'Name of your website is required',
            'primary_email.required' => 'Primary email of your company is required',
            'phone1.required' => 'Compnay phone number is required',
            'office_start_time.required' => 'Office start time is required',
            'office_end_time.required' => 'Office end time is required',
            'break_start_time.required' => 'Break start time is required',
            'break_end_time.required' => 'Break end time is required',
            'max_quotas.required' => 'Max quotas is required',
            'allocation_time.required' => 'Alloction time is required',

        ];
    }
}
