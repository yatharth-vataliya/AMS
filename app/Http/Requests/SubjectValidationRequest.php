<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectValidationRequest extends FormRequest
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
            'subject_name'=>'required|max:191',
            'subject_description'=>'nullable|max:191'            
        ];
    }

    public function messages(){
        return [
                'subject_name.required'=>'subject name is required please fill that filed'
            ];
    }
}
