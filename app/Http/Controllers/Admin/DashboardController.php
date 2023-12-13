<?php

namespace App\Http\Controllers\Admin;

use App\Services\CategoryService;
use App\Services\ListingService;
use App\Services\LocationService;
use App\Services\UserService;

class DashboardController
{
    public function __invoke()
    {
        return view(
            'admin.dashboard',
            [
                'listingsCount' => resolve(ListingService::class)->getListingsCount(),
                'categoriesCount' => resolve(CategoryService::class)->getCategoriesCount(),
                'locationsCount' => resolve(LocationService::class)->getLocationsCount(),
                'usersCount' => resolve(UserService::class)->getUsersCount(),
            ]
        );
    }
}
