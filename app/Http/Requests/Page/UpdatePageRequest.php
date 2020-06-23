<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdatePageRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'title' => 'required|min:3|unique:pages,title,' . $request->page,
            'slug' => 'required|min:3|regex:/^([a-z0-9._-]+)$/|unique:pages,slug,' . $request->page,
            // 'image' => 'mimes:jpeg,bmp,png',
            // 'short_description' => 'required|min:10',
            // 'description' => 'required|min:10',
        ];
    }
}
