<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type'
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

    /**
     * Default value
     *
     * @var array
     */
    protected $attributes = [
        'type' => 'u',
    ];

    const TYPES = [
        'a' => 'ADMINISTRATOR',
        'u' => 'USER',
    ] ;

    public function isAdmin()
    {
        if ($this->type === 'a') {
            return true;
        }

        return false;
    }

    /**
     * get full name for type
     * @param $value
     * @return mixed
     */
    public function getTypeNameAttribute($value)
    {
        if ($this->type) {

            if (isset(User::TYPES[$this->type])) {
                return User::TYPES[$this->type];
            }
        }

        return null;
    }

    /*
     * Relationships
     * */

    public function listings()
    {
        return $this->hasMany(Listing::class, 'submitter_id', 'id');
    }
}
