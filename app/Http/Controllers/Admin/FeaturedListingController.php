<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreFeaturedListingRequest;
use App\Models\FeaturedListing;
use App\Models\Listing;
use App\Services\ListingService;
use App\Services\ProductService;
use Illuminate\Support\Carbon;

class FeaturedListingController
{
    public function create(
        Listing $listing,
        $request = null
    ) {
        $_products = resolve(ListingService::class)->getProductsAsList();

        $view = view('admin.listings.partials._featured._form')
            ->with(
                [
                    'listing' => $listing,
                    '_products' => $_products
                ]
            )
            ->render();

        return response()->json([
            'form' => $view,
        ]);
    }

    public function store(
        Listing $listing,
        StoreFeaturedListingRequest $request
    ) {
        $productId = (int) $request->input('product_id');

        $result = resolve(ProductService::class)
            ->assign(
                $productId,
                $listing
            );

        return response()->json([
            'result' => $result,
        ], 200);
    }

    public function close(
        FeaturedListing $featuredListing
    ) {
        $result = $featuredListing->update([
            'featured_status' => config('featured-listings.statuses.closed'),
            'end_at' => now(),
        ]);

        return response()->json([
            'result' => $result,
        ], 200);
    }
}
