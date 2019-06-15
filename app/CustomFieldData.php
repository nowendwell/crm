<?php

namespace App;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Model;

class CustomFieldData extends Model
{
    use UsesUUID;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'custom_field_id', 'organization_id', 'data'
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
     * Get the CustomField for the CustomFieldData.
     */
    public function customField()
    {
        return $this->belongsTo(\App\CustomField::class);
    }


    /**
     * Get the Organization for the CustomFieldData.
     */
    public function organization()
    {
        return $this->belongsTo(\App\Organization::class);
    }

}
