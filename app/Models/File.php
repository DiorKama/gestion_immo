<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;

    public static $rules = [
        'entity_id' => 'sometimes|required|numeric',
        'entity_type' => 'sometimes|required',
        'group' => 'required',
        'file_name' => 'required',
        'sort_order' => 'nullable|numeric',
    ];

    protected $guarded = ['id'];

    /**
     * @return string
     */
    public function getPathAttribute()
    {
        return $this->path_dir . $this->file_name;
    }

    public function entity()
    {
        return $this->morphTo();
    }
}
