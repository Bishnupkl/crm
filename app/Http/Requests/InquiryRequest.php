<?php

namespace App\Http\Requests;

use App\Rules\Year;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class InquiryRequest extends FormRequest
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

        $rules = collect(
            [
                'type'  => 'required|in:back,front',
                'step'  => 'nullable:in:P3r5oN81in7r3A4Ion,3N671SH9R02ICI3NCY,1N73RE573Dhi57OrY'
            ]
        );
        switch (($request->method())) {
            case 'POST':
                if ($request->type === 'back') {
                    $rules = $rules->merge(
                        [
                            'name' => 'required|string|min:6,max:100',
                            'dob' => 'nullable|date|before:2005-12-30',
                            'permanent_address' => 'nullable|string|max:100',
                            'temporary_address' => 'nullable|string|max:100',
                            'landline' => 'nullable|numeric|digits_between:6,9',
                            'mobile' => 'required_if:email,==,'.null.'|numeric|digits:10',
                            'email' => 'required_if:mobile,==,'.null.'|email|unique:inquiries',
                            'marital_status' => 'nullable|string|max:50',
                            'marriage_date' => 'nullable|date|before:'.date('Y-m-d'),
                            'gender' => 'nullable|String|in:Male,Female,Other',
                            'contact_name' => 'nullable|string|max:100',
                            'contact_relation' => 'nullable|string|max:50',
                            'contact_number' => 'nullable|numeric|digits:10',
                            'bloodgroup' => 'nullable|string|max:20',
                            'nationality' => 'nullable|string|max:100',
                            'name_of_qualification.*' => 'nullable|distinct|string|max:100',
                            'name_of_institution.*' => 'nullable|string|max:191',
                            'academic_start_date.*' => 'nullable|numeric|min:'.date('Y', strtotime('-50 years')).'|max:'.date('Y'),
                            'academic_end_date.*' => 'nullable|numeric|min:'.date('Y', strtotime('-50 years')).'|max:'.date('Y', strtotime('+5 years')),
                            'academic_percentage.*' => 'nullable|numeric|between:1,99.99',
                            'name_of_employer.*' => 'nullable|string|max:100',
                            'duties.*' => 'nullable|string|max:100',
                            'start_year.*' => 'nullable|numeric|min:'.date('Y', strtotime('-50 years')).'|max:'.date('Y'),
                            'end_year.*' => 'nullable|numeric|min:'.date('Y', strtotime('-50 years')).'|max:'.date('Y', strtotime('+5 years')),
                            'test_type' => 'nullable|string|max:50',
                            'test_date' => 'nullable|date',
                            'listening' => 'nullable|numeric|between:1,9.99',
                            'writing' => 'nullable|numeric|between:1,9.99',
                            'speaking' => 'nullable|numeric|between:1,9.99',
                            'reading' => 'nullable|numeric|between:1,9.99',
                            'overall' => 'nullable|numeric|between:1,9.99',
                            'preparation_classes' => 'nullable|string|in:Yes,No',
                            'study_center' => 'nullable|string|max:100',
                            'interested_country' => 'nullable|numeric',
                            'interested_intake' => 'nullable|numeric',
                            'interested_university' => 'nullable|numeric',
                            'interested_course' => 'nullable|numeric',
                            'rejected_before' => 'nullable|string|in:Yes,No',
                            'rejection_reason' => 'nullable|string|max:255',
                            'how_did_you_hear_about_us' => 'nullable|string|max:50'
                        ]
                    );
                }
                break;
            case 'PUT':
                if (isset($request->step) && $request->step==='P3r5oN81in7r3A4Ion'){
                    $rules = $rules->merge(
                        [
                            'name' => 'nullable|string|min:6,max:100',
                            'dob' => 'nullable|date|before:2005-12-30',
                            'permanent_address' => 'nullable|string|max:100',
                            'temporary_address' => 'nullable|string|max:100',
                            'landline' => 'nullable|numeric|digits_between:6,9',
                            'mobile' => 'nullable|numeric|digits:10',
                            'email' => 'nullable|email|exists:inquiries',
                            'marital_status' => 'nullable|string|max:50',
                            'marriage_date' => 'nullable|date|before:'.date('Y-m-d'),
                            'gender' => 'nullable|String|in:Male,Female,Other',
                            'contact_name' => 'nullable|string|max:100',
                            'contact_relation' => 'nullable|string|max:50',
                            'contact_number' => 'nullable|numeric|digits:10',
                            'bloodgroup' => 'nullable|string|max:20',
                            'nationality' => 'nullable|string|max:100'
                        ]
                    );
                }
                if (isset($request->step) && $request->step==='3N671SH9R02ICI3NCY'){
                    $rules = $rules->merge(
                        [
                            'is_taken'  => 'nullable|string|in:Yes,No',
                            'test_type' => 'nullable|string|max:50',
                            'test_date' => 'nullable|date',
                            'listening' => 'nullable|numeric|between:1,9.99',
                            'writing' => 'nullable|numeric|between:1,9.99',
                            'speaking' => 'nullable|numeric|between:1,9.99',
                            'reading' => 'nullable|numeric|between:1,9.99',
                            'overall' => 'nullable|numeric|between:1,9.99',
                            'preparation_classes' => 'nullable|string|in:Yes,No',
                            'study_center' => 'nullable|string|max:100'
                        ]
                    );
                }
                if (isset($request->step) && $request->step==='1N73RE573Dhi57OrY'){
                    $rules = $rules->merge(
                        [
                            'interested_country' => 'nullable|numeric',
                            'interested_intake' => 'nullable|numeric',
                            'interested_university' => 'nullable|numeric',
                            'interested_course' => 'nullable|numeric',
                            'rejected_before' => 'nullable|string|in:Yes,No',
                            'rejection_reason' => 'nullable|string|max:255',
                            'how_did_you_hear_about_us' => 'nullable|string|max:50'
                        ]
                    );
                }
                break;
        }

        return $rules->all();
    }

    public function messages()
    {
        return [
            'mobile.required_if'                  => 'This field is required.',
            'email.required_if'                   => 'This field is required',
            'name_of_qualification.*.distinct'    => 'This field has duplicate value',
            'name_of_qualification.*.max'         => 'This field should not be more then 100 character',
            'name_of_institution.*.max'           => 'This field should not be more then 191 character',
            'academic_start_date.*.numeric'       => 'This field must be a year',
            'academic_end_date.*.numeric'         => 'This field must be a year',
            'academic_start_date.*.min'           => 'This year must greater then '.date('Y',strtotime('-50 years')),
            'academic_start_date.*.max'           => 'This year must be less then '.date('Y'),
            'academic_end_date.*.min'             => 'This year must greater then '.date('Y',strtotime('-50 years')),
            'academic_end_date.*.max'             => 'This year must be less then '.date('Y',strtotime('+5 years')),
            'academic_percentage.*.numeric'       => 'This field must be a number',
            'academic_percentage.*.between'       => 'This field must contain digits between 1-99.99',
            'name_of_employer.*.max'              => 'This field should not be more then 100 character',
            'duties.*.max'                        => 'This field should not be more then 100 character',
            'start_year.*.numeric'                => 'This field must be a year',
            'end_year.*.numeric'                  => 'This field must be a year',
            'start_year.*.min'                    => 'This year must greater then '.date('Y',strtotime('-50 years')),
            'start_year.*.max'                      => 'This year must be less then '.date('Y'),
            'end_year.*.min'                    => 'This year must greater then '.date('Y',strtotime('-50 years')),
            'end_year.*.max'                      => 'This year must be less then '.date('Y',strtotime('+5 years')),
        ];
    }
}
