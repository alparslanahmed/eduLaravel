<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'user_id',
        'campus_id',
        'school_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }


}
