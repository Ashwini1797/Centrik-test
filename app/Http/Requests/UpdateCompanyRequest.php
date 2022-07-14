<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyRequest extends FormRequest
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
            'company_id' => 'required|exists:companies,id',
            'company_name' =>'required',
            'company_email' => 'required',Rule::unique('companies')->ignore($this->company),
            'company_address' => 'required',
            'company_logo' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'company_website' => 'required'
        ];
    }
}
