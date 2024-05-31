<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitUserInfoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // 'email' => 'required|string|email|unique:newsletters|max:150',
            'job_title' => 'max:200',
            'first_name' => 'required|max:200',
            'last_name' => 'required|max:200',
            'email' => 'required|email|max:225',
            'phone' => 'required|max:20',
            'phone' => 'required|max:20',
            'country_id' => 'exists:countries,id',
            'city_id' => 'exists:cities,id',
            'address' => 'max:250',
            'postal_code' => 'max:10',
            'driving_license' => 'max:30',
            'nationality' => 'max:100',
            'birth_place' => 'max:200',
            // 'dob' => 'date|date_format:Y-m-d',
            'professional_summary' => 'max:1500',
            'skillIds' => 'array',
            'hobbies' => 'max:1500',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
