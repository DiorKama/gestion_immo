<?php

namespace App\Services;

use App\Models\Category;
use App\Models\FeaturedListing;
use App\Models\Listing;
use App\Models\Location;
use App\Models\Product;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Carbon;

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

    public function relatedListings(
        Listing $listing
    ) {
        return Listing::query()
            ->where('category_id', $listing->category_id)
            ->where('id', '!=', $listing->id)
            ->active()
            ->get();
    }

    public function premiumListings()
    {
        $currentDateTime = Carbon::now();

        return Listing::query()
            ->select('listings.*')
            ->join(
                'featured_listings',
                function (JoinClause $join) {
                    $join
                        ->on('listings.id', '=', 'featured_listings.listing_id')
                        ->where('listings.listing_status_id', config('listings.statuses.active'));
                }
            )
            ->join(
                'products',
                function (JoinClause $join) {
                    $join
                        ->on('products.id', '=', 'featured_listings.product_id')
                        ->where('products.enabled', true);
                }
            )
            ->where('featured_listings.start_at', '<=', $currentDateTime)
            ->where('featured_listings.end_at', '>=', $currentDateTime)
            ->take(5)
            ->get();
    }

    public function latestListings()
    {
        return Listing::query()
            ->where('listing_status_id', config('listings.statuses.active'))
            ->orderByDesc('first_online_at')
            ->take(5)
            ->get();
    }

    public function getProductsAsList()
    {
        return Product::query()
            // ->onlyEnabled()
            ->orderBy('title')
            ->get()
            ->pluck('title', 'id')
            ->all();
    }
}
