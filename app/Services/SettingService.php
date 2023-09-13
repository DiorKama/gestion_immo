<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SettingService
{
    public function getSetting()
    {
        return Cache::rememberForever('_setting', function () {
            return Setting::whereNotNull('name')
                ->whereNotNull('address')
                ->first();
        });
    }
}
