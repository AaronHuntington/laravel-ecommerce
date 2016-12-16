<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeBillboardCreateRequest extends FormRequest
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
            'photo'=>'required',
            'content'=>'required|unique:advertising',
            'is_active'=>'required'
        ];
    }

    public function messages(){
        return [
            'photo.required' => 'Must add a .JPG image file.',
            'content.required' => 'The name field is required.'
        ];
    }
}
