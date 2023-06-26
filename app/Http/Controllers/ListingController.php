<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\LocationService;
use Carbon\Carbon;
use App\Models\Listing;
use App\Models\AbstractEntity;
use App\Services\ListingService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ListingController extends AbstractAdminController
{

    /**
     * @param Listing $listing
     */
    public function __construct(
        Listing $listing
    ) {
        parent::__construct($listing);
        $this->middleware('auth');
    }

    public function create()
    {
        $listing = Listing::firstOrCreate([
            'user_id' => auth()->user()->id,
            'listing_status_id' => config('listings.statuses.draft'),
        ]);

        $_categories = resolve(CategoryService::class)->getCategories();

        $_locations = resolve(LocationService::class)->getLocationsAsList();

        return view(
            'admin.listings.create',
            compact(
                'listing',
                '_categories',
                '_locations'
            )
        );
    }

    protected function getCollection($request)
    {
        return $this
            ->entity
            ->where('listing_status_id', '!=' , config('listtings.statuses.draft'))
            ->paginate($request->get('perPage') ?: config('limit'));
    }
}
