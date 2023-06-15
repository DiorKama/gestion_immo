<?php

namespace App\Models;

use App\Models\Option;
use App\Models\Listing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OptionListing extends Model
{
    use HasFactory;

    public function options(){
        return $this->belongsTo(Option::class, 'option_id');
    }

    public function listings(){
        return $this->belongsTo(Listing::class, 'listing_id');
    }
}
