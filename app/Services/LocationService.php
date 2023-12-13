<?php

namespace App\Services;

use App\Models\Country;
use App\Models\Location;
use App\Models\Region;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

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

    public function listRegionsWithLocations()
    {
        return Region::query()
            ->onlyEnabled()
            ->with(
                [
                    'locations' => function ($query) {
                        $query->onlyEnabled();
                    },
                ]
            )
            ->get();
    }

    public function getGroupedLocations()
    {
        return Region::query()
            ->onlyEnabled()
            ->with(
                [
                    'locations' => function ($query) {
                        $query->onlyEnabled();
                    },
                ]
            )
            ->get()
            ->keyBy('title')
            ->reject(function ($region) {
                return $region
                    ->locations
                    ->isEmpty();
            })
            ->map(function ($region) {
                return $region
                    ->locations
                    ->where('enabled', true)
                    ->sortBy('title');
            })
            ->all();
    }

    public function getLocationsRecursive(
        Collection $locations,
        $parentId = null
    ) {
        return collect($locations)
            ->map(function ($location) use ($parentId) {
                $data = [
                    'id' => $location->id,
                    'parent_id' => $parentId,
                    'title' => $location->title,
                    'slug' => $location->slug,
                    'children' => [],
                ];

                if (Arr::has($location, 'locations')) {
                    $data['children'] = $this->getLocationsRecursive(
                        $location->locations,
                        $location->id
                    );
                }

                return $data;
            });
    }

    public function getLocationsAsList()
    {
        $locations = $this->listRegionsWithLocations();
        return $this->getLocationsRecursive($locations)->all();
    }

    public function getLocationsCount()
    {
        return Location::query()
            ->count();
    }
}
