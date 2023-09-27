<?php

namespace App\Models;

use App\Contracts\CanHaveFiles;
use App\Models\File;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Banner extends AbstractEntity implements CanHaveFiles
{
    use HasFactory;

    /**
     * @var array
     */
    public static $rules = [
        'title' => 'required',
    ];

    /**
     * @return MorphOne
     */
    public function backgroundImage()
    {
        return $this
            ->morphOne(File::class, 'entity')
            ->where('group', 'banner_bg');
    }

    /**
     * @return MorphOne
     */
    public function mobileBackgroundImage()
    {
        return $this
            ->morphOne(File::class, 'entity')
            ->where('group', 'mobile_banner_bg');
    }

    /**
     * @return MorphMany
     */
    public function files()
    {
        return $this
            ->morphMany(File::class, 'entity');
    }

    public function scopeOnlyEnabled(Builder $query)
    {
        $query->where('enabled', 1);
    }
}
