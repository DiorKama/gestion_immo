<?php

namespace App\Services;

use App\Models\Region;

class RegionServices
{
    public function autocomplete(
        string $text
    ) {
        if (blank($text)) {
            return [];
        }

        $query = Region::query()
            ->where('title', 'LIKE', "%{$text}%");

        return $query
            ->pluck('title', 'id')
            ->all();
    }
}
