<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends AbstractEntity
{
    use HasFactory;
    use Sluggable;

    public const PRODUCT_SLUGS = [
        'bon-plan-hebdomadaire',
        'bon-plan-mensuel',
        'bon-plan-semi-annuel',
        'bon-plan-annuel',
    ];

    /**
     * @var array
     */
    public static $rules = [
        'title' => 'required|max:255|unique:products',
        'lifetime' => 'integer',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function scopeOnlyEnabled(Builder $query)
    {
        $query->where('enabled', 1);
    }
}
