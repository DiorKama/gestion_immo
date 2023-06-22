<?php

namespace App\Models;

use App\Models\Location;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends AbstractEntity
{
    use HasFactory;

    /**
     * @var array
     */
    public static $rules = [
        'title' => 'sometimes|required|unique:countries',
        'enabled' => 'sometimes|boolean',
    ];

    /**
     * {@inheritdoc}
     */
    public $casts = [
        'enabled' => 'bool',
    ];

    protected $guarded = ['id'];

    /**
     * @param string $value
     *
     * @throws \Exception
     */
    public function setStatusAttribute($value)
    {
        if ($value === 'enabled') {
            $this->enabled = true;
        } elseif ($value === 'disabled') {
            $this->enabled = false;
        } else {
            throw new \Exception('Unhandled status for category: ' . $value);
        }
    }

    public function locations() {
        return $this->hasMany(Location::class);
    }

    public function scopeOnlyEnabled(Builder $query)
    {
        $query->where('enabled', 1);
    }
}
