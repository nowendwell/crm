<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'api_token', 'organization_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    /**
     * Get the Accounts for the User.
     */
    public function accounts()
    {
        return $this->hasMany(\App\Account::class, 'owner_id');
    }


    /**
     * Get the Contacts for the User.
     */
    public function contacts()
    {
        return $this->hasMany(\App\Contact::class, 'owner_id');
    }


    /**
     * Get the Organization for the User.
     */
    public function organization()
    {
        return $this->belongsTo(\App\Organization::class);
    }

}
