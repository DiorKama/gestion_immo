<?php

namespace App\Models;

use App\Models\Listing;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends AbstractEntity
{
    use HasFactory;
    use Sluggable;

    /**
     * @var array
     */
    public static $rules = [
        'title' => 'sometimes|required|unique:regions',
        'country_id' => 'required|exists:countries,id',
        'enabled' => 'sometimes|boolean',
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

    public function locations() {
        return $this->hasMany(Location::class);
    }

    public function country() {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function listings() {
        return $this->hasManyThrough(Listing::class, Location::class);
    }

    public function scopeOnlyEnabled(Builder $query)
    {
        $query->where('enabled', 1);
    }
}
