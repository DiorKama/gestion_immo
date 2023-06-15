<?php

namespace App\Models;

use App\Models\File;
use App\Models\User;
use App\Models\Setting;
use App\Models\Location;
use App\Models\Categorie;
use App\Models\OptionListing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Listing extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories(){
        return $this->belongsTo(Categorie::class, 'category_id');
    }

    public function locations(){
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function optionListing(){
        return $this->hasMany(OptionListing::class);
    }

}
