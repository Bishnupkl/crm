<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'course_name'       => 'required|exists:courses,id',
            'partner_name'      => 'required|exists:partners,id',
            'fee_type'          => 'required|string|max:100',
            'fee_amount'        => 'required|numeric|min:0',
            'fee_term'          => 'nullable|string:max:50',
            'duration'          => 'nullable|numeric|min:0',
            'intake'            => 'nullable|integer|exists:intakes,id',
            'description'       => 'nullable|string|max:500'
        ];
    }
}
