<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface CanHaveFiles
{
    /**
     * @return MorphMany
     */
    public function files();
}
