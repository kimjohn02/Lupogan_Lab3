<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'location_id';

    protected $fillable = [
        'street_address',
        'postal_code',
        'city',
        'state_province',
        'country_id',
    ];

    /**
     * A location belongs to a country.
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'country_id');
    }

    /**
     * A location has many departments.
     */
    public function departments()
    {
        return $this->hasMany(Department::class, 'location_id', 'location_id');
    }
}
