<?php

namespace App\Models;

use App\Models\File;
use App\Models\User;
use App\Models\Region;
use App\Models\Category;
use App\Models\Location;
use App\Models\OptionListing;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Listing extends AbstractEntity
{


    use HasFactory;
    use Sluggable;

    /**
     * @var array
     */
    public static $rules = [
        'title' => 'sometimes|required|unique:listings',
        'enabled' => 'sometimes|boolean',
        'description' => 'sometimes|required',
        'area' => 'sometimes|integer|required',
        'rooms' => 'sometimes|integer|required',
        'bedrooms' => 'sometimes|integer|required',
        'bathrooms' => 'sometimes|integer|required',
        'price' => 'sometimes|integer|required',
        'sold' => 'sometimes|boolean',
        'user_id' => 'required|exists:users,id',
        'location_id' => 'required|exists:locations,id',
        'category_id' => 'required|exists:categories,id',
    ];

    /**
     * {@inheritdoc}
     */
    public $casts = [
        'enabled' => 'bool',
    ];

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function location() {
        return $this->belongsTo(Location::class, 'location_id');
    }

    /*public function region() {
        return $this->belongsTo(Region::class, 'region_id', 'id', 'location');
    }*/

    public function optionListing() {
        return $this->hasMany(OptionListing::class);
    }


}
