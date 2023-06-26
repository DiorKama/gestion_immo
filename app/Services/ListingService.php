<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Location;

class ListingService
{
    public function getCategoriesAsList()
    {
        return Category::query()
            // ->onlyEnabled()
            ->orderBy('title')
            ->get()
            ->pluck('title', 'id')
            ->all();
    }

    public function getLocationsAsList()
    {
        return Location::query()
            // ->onlyEnabled()
            ->orderBy('title')
            ->get()
            ->pluck('title', 'id')
            ->all();
    }
}