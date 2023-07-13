<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait StorageTrait
{
    protected function getStorageDisk()
    {
        $storage = Storage::disk(config('filesystems.default'));

        return $storage;
    }
}
