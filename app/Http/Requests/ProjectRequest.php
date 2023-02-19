<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required' ,'max:255','unique:projects,name'],
            'description'=> ['required'],
            'address'=> ['required'],
//            'image'=> ['required|image'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'A title for the project is required',
            'image.image' => 'The uploaded file should be an image',
        ];
    }
}
