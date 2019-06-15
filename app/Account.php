<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'organization_id', 'name', 'url', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        //
    ];    

    /**
     * Get the Contacts for the Account.
     */
    public function contacts()
    {
        return $this->hasMany(\App\Contact::class);
    }


    /**
     * Get the User for the Account.
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }


    /**
     * Get the Organization for the Account.
     */
    public function organization()
    {
        return $this->belongsTo(\App\Organization::class);
    }

}