<?php

namespace App\Models;

use App\Models\File;
use App\Models\User;
use App\Models\Setting;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories(){
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function options(): BelongsToMany {
        return $this->belongsToMany(Option::class, 'option_listing');
    }

    public function files(){
        return $this->hasMany(File::class);
    }
}
