<?php

namespace App\Models;

use App\Models\Regions;
use App\Models\Countries;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function countries(){
        return $this->belongsTo(Countries::class, 'country_id');
    }

    public function region(){
        return $this->belongsTo(Regions::class, 'region_id');
    }
}
