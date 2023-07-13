<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends AdminRequest
{
    public function rules(): array
    {
        return array_merge(
            parent::rules(),
            [
                'banner_bg.image' => 'required|file|mimes:jpeg,png,jpg,gif',
                'mobile_banner_bg.image' => 'required|file|mimes:jpeg,png,jpg,gif',
            ]
        );
    }
}
