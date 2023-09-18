<?php

namespace App\Models;

use App\Contracts\CanHaveFiles;
use App\Models\File;
use App\Models\User;
use App\Models\Region;
use App\Models\Category;
use App\Models\Location;
use App\Models\OptionListing;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

class Listing extends AbstractEntity implements CanHaveFiles
{
    use HasFactory;
    use Sluggable;

    protected $appends = [
        'display_date',
    ];

    /**
     * @var array
     */
    public static $rules = [
        'title' => 'sometimes|required',
        'description' => 'sometimes|required',
        'area' => 'sometimes|integer|required',
        'rooms' => 'sometimes|integer|required',
        'bedrooms' => 'sometimes|integer|required',
        'bathrooms' => 'sometimes|integer|required',
        'price' => 'sometimes|integer|required',
        'sold' => 'sometimes|boolean',
        'user_id' => 'sometimes|exists:users,id',
        'location_id' => 'required|exists:locations,id',
        'category_id' => 'required|exists:categories,id',
        'listing_status_id' => 'sometimes|exists:listing_statuses,id'
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

    public function status() {
        return $this->belongsTo(ListingStatus::class, 'listing_status_id');
    }

    public function optionListing() {
        return $this->hasMany(OptionListing::class);
    }

    public function getRegionAttribute()
    {
        return $this->location->region ?? null;
    }

    public function getRegionSlugAttribute()
    {
        return $this->region ? $this->region->slug : null;
    }

    public function getRegionTitleAttribute()
    {
        return $this->region ? $this->region->title : null;
    }

    /**
     * Get all of the listing's files.
     */
    public function files()
    {
        return $this->morphMany(File::class, 'entity');
    }

    /**
     * @return Collection|File[]
     */
    public function images()
    {
        return $this
            ->files
            ->where('group', 'picture');
    }

    /**
     * Get listing statistics
     */
    public function listingStatistic()
    {
        return $this->hasOne(ListingStatistic::class, 'listing_id');
    }

    /**
     * Adds a condition for status "active" to the builder
     *
     * @param Builder $query
     */
    public function scopeActive(
        Builder $query
    ) {
        return $query->where('listings.listing_status_id', config('listings.statuses.active'));
    }

    /**
     * Adds a condition for status "disabled" to the builder
     *
     * @param Builder $query
     */
    public function scopeDisabled(
        Builder $query
    ) {
        return $query->where('listing_status_id', config('listings.statuses.disabled'));
    }

    /**
     * Adds a condition for status "draft" to the builder
     *
     * @param Builder $query
     */
    public function scopeDraft(
        Builder $query
    ) {
        return $query->where('listing_status_id', config('listings.statuses.draft'));
    }

    public function getDisplayDateAttribute()
    {
        return (string) $this->updated_at;
    }

    public function getViewsAttribute()
    {
        return $this->listingStatistic->views ?? 0;
    }

    public function getEnquiryCountAttribute()
    {
        return $this->listingStatistic->enquiry_count ?? 0;
    }

    public function getPhoneNumberViewsAttribute()
    {
        return $this->listingStatistic->phone_number_views ?? 0;
    }

    public function getWhatsappViewsAttribute()
    {
        return $this->listingStatistic->whatsapp_views ?? 0;
    }
}
