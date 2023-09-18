<?php

namespace App\Services;

use App\Models\ListingStatistic;
use Illuminate\Support\Facades\DB;

class ListingStatisticsService
{
    public function incrementViews(
        $listing
    ) {
        dispatch_after_response(
            function () use (&$listing) {
                $this->incrementField(
                    'views',
                    $listing->id
                );
            }
        );
    }

    public function incrementPhoneNumberViews(
        $listing
    ) {
        dispatch_after_response(
            function () use (&$listing) {
                $this->incrementField(
                    'phone_number_views',
                    $listing->id
                );
            }
        );
    }

    public function incrementWhatsappViews(
        $listing
    ) {
        dispatch_after_response(
            function () use (&$listing) {
                $this->incrementField(
                    'whatsapp_views',
                    $listing->id
                );
            }
        );
    }

    protected function incrementField(
        string $field,
        int $id
    ) {
        ListingStatistic::firstOrCreate(
            [
                'listing_id' => $id,
            ]
        )->increment($field, 1);
    }
}
