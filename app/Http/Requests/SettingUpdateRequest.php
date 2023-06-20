<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:255'],
            'slogan' => ['sometimes', 'required'],
            'about' => ['required'],
            'address' => ['required'],
            'email' => ['required', 'email'],
            'phone_number' => ['required', 'string'],
            'mobile_number' => ['required', 'string'],
            'website_url' => ['sometimes', 'url'],
            'facebook_url' => ['sometimes', 'url'],
            'twitter_url' => ['sometimes', 'url'],
            'instagram_url' => ['sometimes', 'url'],
            'linkedin_url' => ['sometimes', 'url'],
        ];
    }
}
