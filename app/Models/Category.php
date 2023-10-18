<?php

namespace App\Models;

use App\Models\Listing;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Validation\Rule;

class Category extends AbstractEntity
{
    use HasFactory;
    use Sluggable;

    /**
     * @var array
     */
    public static $rules = [
        'title' => 'sometimes|required',
        'description' => 'required',
        'sort_order' => 'required|integer',
        'parent_id' =>  'nullable|exists:categories,id',
    ];

    protected $guarded = ['id'];

    public function listings(){
        return $this->hasMany(Listing::class);
    }

    public function parent(){
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * @return bool
     */
    public function getHasChildrenAttribute()
    {
        return $this
            ->children()
            ->exists();
    }

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
