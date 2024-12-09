<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $fillable = [
        'name',
        'school_id',
        'address',
        'city',
        'state',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function classRooms()
    {
        return $this->hasMany(ClassRoom::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
