<?php

namespace App\Services;

use App\Models\Country;

class CountryService
{
    public function getAreaCodesAsLookup()
    {
        return Country::query()
            ->select(
                'area_code',
                'iso'
            )
            ->orderBy('iso', 'asc')
            ->get()
            ->mapWithKeys(
                function ($country) {
                    return [
                        $country->iso => sprintf(
                            '%s (%s)',
                            $country->iso,
                            $country->area_code
                        ),
                    ];
                }
            )
            ->all();
    }

    public function autocomplete(
        string $text
    ) {
        if (blank($text)) {
            return [];
        }

        $query = Country::query()
            ->where('title', 'LIKE', "%{$text}%");

        return $query
            ->pluck('title', 'id')
            ->all();
    }
}
