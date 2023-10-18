<?php

namespace App\UseCases;

class UpdateListingStatus
{
    public function handle(
        $listing,
        $statusId
    ) {
        if ( $listing->update([
            'listing_status_id' => $statusId
        ]) ) {
            return $listing;
        }

        return false;
    }
}
