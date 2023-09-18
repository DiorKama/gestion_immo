<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class ListingStatistic extends AbstractEntity
{
    use HasFactory;

    public $timestamps = false;

    public function listing() {
        return $this->belongsTo(Listing::class);
    }
}
