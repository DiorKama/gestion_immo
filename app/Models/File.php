<?php

namespace App\Models;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = [
        'path_url' => 'string', // Supprimez ou modifiez 'array' en 'string'
    ];

    public function listings(){
        return $this->belongsTo(Listing::class, 'listing_id');
    }
}
