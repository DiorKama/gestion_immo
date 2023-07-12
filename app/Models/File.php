<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    /**
     * Get the parent filable model (banner or listing).
     */
    public function entity(): MorphTo
    {
        return $this->morphTo();
    }
}
