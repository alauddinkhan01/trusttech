<?php

namespace App\Http\Requests\API\V1\CVVoiceNote;

use Illuminate\Foundation\Http\FormRequest;

class CreateCVVoiceNoteRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'the user id is required.',
            'user_id.exists' => 'the user dose not exist.',
        ];
    }
}
