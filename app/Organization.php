<?php

namespace App;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use UsesUUID;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'name', 'deleted_at'
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
     * Get the Users for the Organization.
     */
    public function users()
    {
        return $this->hasMany(\App\User::class);
    }


    /**
     * Get the Accounts for the Organization.
     */
    public function accounts()
    {
        return $this->hasMany(\App\Account::class, 'owner_id');
    }


    /**
     * Get the CustomFields for the Organization.
     */
    public function customFields()
    {
        return $this->hasMany(\App\CustomField::class);
    }


    /**
     * Get the CustomFieldData for the Organization.
     */
    public function customFieldData()
    {
        return $this->hasMany(\App\CustomFieldData::class);
    }

}
