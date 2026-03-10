<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'job_id';

    protected $fillable = [
        'job_title',
        'min_salary',
        'max_salary',
    ];

    /**
     * A job has many employees.
     */
    public function employees()
    {
        return $this->hasMany(Employee::class, 'job_id', 'job_id');
    }
}
