<?php

namespace App\Http\Requests\API\V1\CVVoiceNote;

use App\Http\Requests\API\V1\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class SendVoiceNoteRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'voice_note' => 'required|file|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
        ];
    }

    public function messages()
    {
        return [
            'voice_note.mimes' => 'The voice note must be an audio file.',
        ];
    }
}
