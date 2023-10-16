<?php

namespace App\UseCases;

use App\Models\User;
use App\UseCases\Traits\Validation;
use Illuminate\Validation\Rules;

class RegisterUser
{
    use Validation;

    public function rules()
    {
        return array_merge(User::$rules, [
            'password' => ['required', Rules\Password::defaults()],
        ]);
    }

    /**
     * @param array $data
     *
     * @throws \Throwable
     *
     * @return User
     */
    public function handle(array $data)
    {
        $data = $this->validate($data);
        return User::create($data);
    }
}
