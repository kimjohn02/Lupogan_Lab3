<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'country_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'country_id',
        'country_name',
        'region_id',
    ];

    /**
     * A country belongs to a region.
     */
    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id', 'region_id');
    }

    /**
     * A country has many locations.
     */
    public function locations()
    {
        return $this->hasMany(Location::class, 'country_id', 'country_id');
    }
}
