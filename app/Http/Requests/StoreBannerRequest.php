<?php

namespace App\Http\Requests;

use App\Models\Listing;
use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
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
        return[
             'title' => 'required|max:255',
             'url' => 'nullable|max:255',
            'file' => [
                'required',
                File::types(['jpeg', 'jpg','png']),
            ],
        ];
    }
}