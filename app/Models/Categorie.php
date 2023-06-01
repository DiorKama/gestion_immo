<?php

namespace App\Models;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function listings(){
        return $this->hasMany(Listing::class);
    }

    public function parent(){
        return $this->belongsTo(self::class, 'parent_id');
    }
}
