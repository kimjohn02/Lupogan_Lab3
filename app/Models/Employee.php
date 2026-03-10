<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'hire_date',
        'job_id',
        'salary',
        'manager_id',
        'department_id',
    ];

    /**
     * An employee belongs to a job.
     */
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'job_id');
    }

    /**
     * An employee belongs to a department.
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'department_id');
    }

    /**
     * An employee has a manager (self-referencing).
     */
    public function manager()
    {
        return $this->belongsTo(Employee::class, 'manager_id', 'employee_id');
    }

    /**
     * An employee can manage other employees (self-referencing).
     */
    public function subordinates()
    {
        return $this->hasMany(Employee::class, 'manager_id', 'employee_id');
    }

    /**
     * An employee has many dependents.
     */
    public function dependents()
    {
        return $this->hasMany(Dependent::class, 'employee_id', 'employee_id');
    }
}
