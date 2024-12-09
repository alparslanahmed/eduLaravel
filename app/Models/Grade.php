<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['name', 'slug', 'description'];

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
        return $this->belongsToMany(Course::class);
    }

}
