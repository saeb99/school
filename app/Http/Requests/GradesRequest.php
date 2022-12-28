<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class GradesRequest extends FormRequest
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
            'name' => 'required',
            'name_en' => 'required',
        ];
    }

    public function messages()
    {
        $locale = LaravelLocalization::getCurrentLocale();

        if($locale == 'en'){
            $messages = [
                'name.required' => 'name ar is required',
                'name_en.required' => 'name en is required',
            ];
        }else{
            $messages = [
                'name.required' => 'حقل الاسم عربي مطلوب',
                'name_en.required' => 'حقل الاسم انجليزي مطلوب',
            ];
        }

        return $messages;
    }
}
