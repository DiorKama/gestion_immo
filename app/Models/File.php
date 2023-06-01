<?php

namespace App\Models;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function listings(){
        return $this->belongsTo(Listing::class, 'listing_id');
    }
}
