<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'company_name' =>'required',
            'company_email' => 'required|email|unique:companies,email',
            'company_address' => 'required',
            'company_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'company_website' => 'required'
        ];
    }
}
