<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable, HasRoles;

    const USER_ROLES = ['ADMIN' => 1, 'GENERAL' => 2, 'MODERATOR' => 3, 'TRANSLATOR' => 4];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password', 'type', 'user_role', 'nick_name', 'is_verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function getOrganizationProfile()
    {
        return $this->hasMany(OrganizationProfile::class);
    }

    protected function getGeneralProfile()
    {
        return $this->hasOne(GeneralProfile::class);
    }

    public function language()
    {
        return $this->hasMany('App\Models\Language', 'user_id');
    }
}
