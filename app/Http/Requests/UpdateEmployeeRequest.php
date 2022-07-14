<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
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
            'employee_first_name' =>'required',
            'employee_last_name' => 'required',
            'employee_email' => 'required',Rule::unique('employees')->ignore($this->employee),
            'employee_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ];
    }
}
