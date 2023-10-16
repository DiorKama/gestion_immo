<?php

namespace App\Models;

use App\Models\Listing;
use App\Models\Traits\MobileNumberTrait;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Foundation\Auth\Access\Authorizable;

class User extends AbstractEntity implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract,
    MustVerifyEmailContract {
    use HasApiTokens, HasFactory, Notifiable, Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;
    use MobileNumberTrait;

    /**
     * @var array
     */
    public static $rules = [
        'firstName' => 'required|string|max:255',
        'lastName' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'mobile_number_country' => 'required|string|max:255',
        'phone_number' => 'required|string|max:255',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
        'mobile_number_country',
        'phone_number',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function listings() {
        return $this->hasMany(Listing::class);
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->firstName} {$this->lastName}";
    }

    /**
     * {@inheritdoc}
     */
    protected function crudFilterAddTextSearch(
        Builder $query,
        string $q = null
    ) {
        return $query->where(function (Builder $query) use ($q) {
            $query
                ->where('firstname', 'LIKE', "%{$q}%")
                ->orWhere('lastname', 'LIKE', "%{$q}%")
                ->orWhere('email', 'LIKE', "%{$q}%")
                ->orWhere('id', $q);
        });
    }
}
