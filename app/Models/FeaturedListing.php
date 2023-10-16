<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedListing extends AbstractEntity
{
    use HasFactory;

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function listing() {
        return $this->belongsTo(Listing::class, 'listing_id');
    }

    public function getRunningAttribute()
    {
        return $this->featured_status === config('featured-entities.statuses.running');
    }
}
