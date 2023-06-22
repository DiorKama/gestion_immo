<?php

namespace App\Models;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
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
}
