<?php

namespace App\UseCases;

use App\Models\User;
use App\UseCases\Traits\Validation;
use Illuminate\Validation\Rule;

class UpdateUser
{
    use Validation;

    public function rules()
    {
        return [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'mobile_number_country' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
        ];
    }

    /**
     * @param User $user
     * @param array $data
     *
     * @return void
     */
    public function handle(
        User $user,
        array $data
    ) {
        $user
            ->fill(
                $this->validate($data)
            );

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();
    }
}
