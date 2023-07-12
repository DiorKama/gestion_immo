<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

     /**
     * Get all of the banner's files.
     */
    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'entity');
    }
    public function hasFile() {
        $file = File::where('entity_type', 'banner')
            ->where('entity_id', $this->id)
            ->first();

        return $file->id ?? null;
    }
}
