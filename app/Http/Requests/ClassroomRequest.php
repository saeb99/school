<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ClassroomRequest extends FormRequest
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
            'List_Classes.*.name_class_ar' => 'required',
            'List_Classes.*.name_class_en' => 'required',
            'List_Classes.*.grade_id' => 'required',
        ];
    }

    public function messages()
    {
        $locale = LaravelLocalization::getCurrentLocale();

        if($locale == 'en'){
            $messages = [
                'name_class_ar.required' => 'name ar is required',
                'name_class_en.required' => 'name en is required',
                'grade_id.required' => 'grade is required',
            ];
        }else{
            $messages = [
                'name_class_ar.required' => 'حقل الاسم عربي مطلوب',
                'name_class_en.required' => 'حقل الاسم انجليزي مطلوب',
                'grade_id.required' => 'حقل الفصل مطلوب',
            ];
        }

        return $messages;
    }
}
