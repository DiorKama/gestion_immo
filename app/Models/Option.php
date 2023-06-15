<?php

namespace App\Models;

use App\Models\OptionListing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Option extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function optionListing(){
        return $this->hasMany(OptionListing::class);
    }
    
}
