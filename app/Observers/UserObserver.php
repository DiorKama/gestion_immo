<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserObserver
{
    public function saving(User $user)
    {
        if (
            $user->isDirty('password')
            && Hash::needsRehash($user->password)
        ) {
            $user->password = Hash::make($user->password);
        }

        if (
            $user->isDirty('phone_number')
        ) {
            $user->setFullMobileNumber();
        }
    }
}
