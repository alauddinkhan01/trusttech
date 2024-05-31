<?php

namespace App\Http\Requests\API\V1\Auth;

use App\Http\Requests\API\V1\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => ['required', Rule::unique('users', 'email')],
            'phone_number' => 'required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
