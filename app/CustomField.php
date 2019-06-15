<?php

namespace App;

use App\Traits\UsesUUID;
use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    use UsesUUID;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'display_name', 'type', 'organization_id', 'parent_object_type'
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
     * Get the CustomFieldData for the CustomField.
     */
    public function customFieldData()
    {
        return $this->hasMany(\App\CustomFieldData::class);
    }


    /**
     * Get the Organization for the CustomField.
     */
    public function organization()
    {
        return $this->belongsTo(\App\Organization::class);
    }

}
