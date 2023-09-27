<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;

class UserService
{
    public function autocomplete(
        string $text
    ) {
        if (blank($text)) {
            return [];
        }

        return User::query()
            ->select(
                [
                    'id',
                    'email',
                    'firstName',
                    'lastName',
                    'phone_number',
                ]
            )
            ->where(
                function (Builder $query) use ($text) {
                    $query
                        ->where('email', 'like', '%' . $text . '%')
                        ->orWhere('phone_number', 'like', '%' . $text . '%')
                        ->orWhere('firstName', 'like', '%' . $text . '%')
                        ->orWhere('lastName', 'like', '%' . $text . '%')
                        ->orWhere('id', $text);
                }
            )
            ->get()
            ->keyBy('id')
            ->map(function ($user) {
                return implode(
                    ' | ',
                    array_filter(
                        [
                            $user->id,
                            $user->firstName,
                            $user->lastName,
                            $user->email,
                            $user->phone_number,
                        ]
                    )
                );
            })
            ->all();
    }
}
