<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class UpdateBannerRequest extends FormRequest
{
    public function authorize()
    {
        // Définir ici la logique d'autorisation si nécessaire
        return true;
    }

    public function rules()
    {
        return[
            'title' => 'required|max:255',
            'url' => 'nullable|max:255',
           'file' => 
               'required',
               File::types(['jpeg', 'jpg','png']),
           
        ];
    }
}
