<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'username',
        'fullname',
        'gender',
        'religion',
        'phone',
        'address',
        'dob',
        'department_name'
    ];

    public function leaveApplications() {
        return $this->hasMany(LeaveApplication::class, 'teacher', 'username');
    }

    public function courses() {
        return $this->hasMany(Course::class, 'teacher', 'username');
    }

    public function getUser() {
        return $this->belongsTo(User::class, 'username', 'username');
    }
}
