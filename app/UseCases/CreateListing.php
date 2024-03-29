<?php

namespace App\UseCases;

use App\Models\Listing;
use Illuminate\Support\Arr;

class CreateListing
{
    public function handle(
        $data = []
    ) {
        $listingid = Arr::get($data, 'listing_id');
        $listing = Listing::find($listingid);
        $listing->fill(Arr::except(array_merge(
            $data, [
                'listing_status_id' => config('listings.statuses.active')
            ]
        ), ['listing_id']));

        if ( $listing->save() ) {
            return $listing;
        }

        return false;
    }
}
