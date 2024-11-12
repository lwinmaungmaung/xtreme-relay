<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthenticationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|string',
            'password' => 'required|string',
            'type' => 'nullable|string',
            'action' => 'nullable|string',
            'category_id' => 'nullable|integer',
            'vod_id' => 'nullable|integer',
            'series' => 'nullable|string',
            'stream_id' => 'nullable|integer',
        ];
    }
}
