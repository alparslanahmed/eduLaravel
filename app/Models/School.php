<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name',
        'state',
    ];

    public function campuses()
    {
        return $this->hasMany(Campus::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function classRooms()
    {
        return $this->hasMany(ClassRoom::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
