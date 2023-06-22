<?php

namespace App\Services;

use App\Models\Country;
use App\Models\Region;

class LocationService
{
    public function getCountriesAsList()
    {
        return Country::query()
            ->onlyEnabled()
            ->orderBy('title')
            ->get()
            ->pluck('title', 'id')
            ->all();
    }

    public function getRegionsAsList()
    {
        return Region::query()
            ->onlyEnabled()
            ->orderBy('title')
            ->get()
            ->pluck('title', 'id')
            ->all();
    }
}
