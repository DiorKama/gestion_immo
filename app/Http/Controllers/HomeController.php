<?php

namespace App\Http\Controllers;

use App\Services\ListingService;

class HomeController
{
    public function __invoke()
    {
        return view(
            'home.index',
            [
                'premiumListings' => resolve(ListingService::class)->premiumListings(),
                'latestListings' => resolve(ListingService::class)->latestListings(),
            ]
        );
    }
}
