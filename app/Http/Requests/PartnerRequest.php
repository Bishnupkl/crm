<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PartnerRequest extends FormRequest
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
     * @param Request $request
     * @return mixed
     */

    public function rules(Request $request)
    {
        $rules = collect([]);
        switch (($request->method())) {
            case 'POST':
                $rules = $rules->merge(
                    [
                        'name'                      => 'required|string|max:100',
                        'category_id'                  => 'nullable|string|in:Institution,University,College',
                        'street'                    => 'nullable|string|max:100',
                        'city'                      => 'nullable|string|max:100',
                        'state'                     => 'nullable|string|max:100',
                        'country'                   => 'nullable|numeric|exists:countries,id',
                        'phone'                     => 'nullable|numeric|digits:10',
                        'email'                     => 'nullable|email|unique:inquiries',
                        'fax'                       => 'nullable|numeric|digits_between:6,10',
                        'website'                   => 'nullable|url'
                    ]
                );
                break;
        }
        return $rules->all();
    }
}
