<?php

namespace App\Http\Requests\Fronend;

use Illuminate\Foundation\Http\FormRequest;

class CreatePatientEnquiryRequest extends FormRequest
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
        // dd(FormRequest::all());
        return [
            'name'           => 'required',
            'email'          => 'required|email',
            'password'       => 'required',
            'contact_number' => 'required|numeric|digits:10',
            'state'          => 'required',
            'city'           => 'required',
            'address'        => 'required', 
            'pincode'        => 'required|numeric|digits:6',
            'cancer_id'      => 'required',
           /* 'document_file'      => 'required',
            'document_file.*'    => 'mimes:jpeg,jpg,png,pdf,mp4|max:10000'*/
        ];
    }
}
