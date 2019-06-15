<?php

namespace App;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use UsesUUID;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_id', 'first_name', 'last_name', 'title', 'dob', 'user_id', 'type'
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
     * Get the User for the Contact.
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'owner_id');
    }


    /**
     * Get the Account for the Contact.
     */
    public function account()
    {
        return $this->belongsTo(\App\Account::class);
    }

}
