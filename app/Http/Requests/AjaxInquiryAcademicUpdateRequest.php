<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AjaxInquiryAcademicUpdateRequest extends FormRequest
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
            'name_of_qualification' => 'required|distinct|string|max:100',
            'name_of_institution' => 'required|string|max:191',
            'start_date' => 'nullable|numeric|min:'.date('Y', strtotime('-50 years')).'|max:'.date('Y'),
            'end_date' => 'nullable|numeric|min:'.date('Y', strtotime('-50 years')).'|max:'.date('Y', strtotime('+5 years')),
            'percentage' => 'nullable|numeric|between:1,99.99'
        ];
    }

    public function messages()
    {
        return [
            'name_of_qualification.distinct'    => 'This field has duplicate value',
            'name_of_qualification.max'         => 'This field should not be more then 100 character',
            'name_of_institution.max'           => 'This field should not be more then 191 character',
            'start_date.numeric'       => 'This field must be a year',
            'end_date.numeric'         => 'This field must be a year',
            'start_date.min'           => 'This year must greater then '.date('Y',strtotime('-50 years')),
            'start_date.max'           => 'This year must be less then '.date('Y'),
            'end_date.min'             => 'This year must greater then '.date('Y',strtotime('-50 years')),
            'end_date.max'             => 'This year must be less then '.date('Y',strtotime('+5 years')),
            'percentage.numeric'       => 'This field must be a number',
            'percentage.between'       => 'This field must contain digits between 1-99.99'
        ];
    }
}