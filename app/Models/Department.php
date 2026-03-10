<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'department_id';

    protected $fillable = [
        'department_name',
        'location_id',
    ];

    /**
     * A department belongs to a location.
     */
    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'location_id');
    }

    /**
     * A department has many employees.
     */
    public function employees()
    {
        return $this->hasMany(Employee::class, 'department_id', 'department_id');
    }
}
