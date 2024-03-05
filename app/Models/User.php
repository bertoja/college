<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'first_name',
        'last_name',
        'role',
        'rut',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function scores()
    {
        return $this->hasMany(Score::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student', 'course_id', 'student_id');
    }
}
