<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AjaxExperienceRequest extends FormRequest
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
            'name_of_employer'   => 'required|string|max:100',
            'duties'                => 'nullable|string|max:100',
            'start_date'            => 'nullable|numeric|min:'.date('Y', strtotime('-50 years')).'|max:'.date('Y'),
            'end_date'              => 'nullable|numeric|min:'.date('Y', strtotime('-50 years')).'|max:'.date('Y', strtotime('+5 years'))
        ];
    }

    public function messages()
    {
        return [
            'name_of_employer.max'            => 'This field should not be more then 100 character',
            'duties.max'                      => 'This field should not be more then 100 character',
            'start_date.numeric'              => 'This field must be a year',
            'end_date.numeric'                => 'This field must be a year',
            'start_date.min'                  => 'This year must greater then '.date('Y',strtotime('-50 years')),
            'start_date.max'                  => 'This year must be less then '.date('Y'),
            'end_date.min'                    => 'This year must greater then '.date('Y',strtotime('-50 years')),
            'end_date.max'                    => 'This year must be less then '.date('Y',strtotime('+5 years'))
        ];
    }
}
