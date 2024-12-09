<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $fillable = ['name', 'description', 'grade_id', 'campus_id', 'school_id'];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
