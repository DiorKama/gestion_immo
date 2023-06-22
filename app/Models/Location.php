<?php

namespace App\Models;

use App\Models\Region;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends AbstractEntity
{
    use HasFactory;
    use Sluggable;

    /**
     * @var array
     */
    public static $rules = [
        'title' => 'sometimes|required|unique:locations',
        'enabled' => 'sometimes|boolean',
        'country_id' => 'required|exists:countries,id',
        'region_id' => 'required|exists:regions,id'
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

    public function country() {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function region() {
        return $this->belongsTo(Region::class, 'region_id');
    }
}
