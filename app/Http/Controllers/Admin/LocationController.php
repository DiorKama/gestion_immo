<?php

namespace App\Http\Controllers\Admin;

use App\Models\AbstractEntity;
use App\Models\Location;
use App\Models\Region;
use App\Services\LocationService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LocationController extends AbstractAdminController
{
    /**
     * @param Location $location
     */
    public function __construct(
        Location $location
    ) {
        parent::__construct($location);
        $this->middleware('auth');
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {

    }

    public function create()
    {
        $_countries = resolve(LocationService::class)->getCountriesAsList();
        $_regions = resolve(LocationService::class)->getRegionsAsList();

        return view(
            'admin.locations.create',
            compact(
                '_countries',
                '_regions'
            )
        );
    }

    public function edit(
        AbstractEntity $location
    ) {
        $_countries = resolve(LocationService::class)->getCountriesAsList();
        $_regions = resolve(LocationService::class)->getRegionsAsList();

        return view(
            'admin.locations.edit',
            compact(
                'location',
                '_countries',
                '_regions'
            )
        );
    }
}
