<?php

namespace App;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use UsesUUID;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'emailable_id', 'emailable_type'
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
}
