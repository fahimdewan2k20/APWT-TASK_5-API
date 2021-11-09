<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
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
        'department_name',
        'admission_time'
    ];

    public function courses() {
        return $this->hasMany(CourseDetails::class, 'student', 'username')->courses;
    }

    public function getMarks($course_id) {
        return $this->hasMany(Grade::class, 'student', 'username')->select('marks')->where('course_id', $course_id)->first();
    }

    public function grades() {
        return $this->hasMany(Grade::class, 'student', 'username');
    }

    public function transactions() {
        return $this->hasMany(Transaction::class, 'student', 'username');
    }

    public function getUser() {
        return $this->belongsTo(User::class, 'username', 'username');
    }

    public function account() {
        return $this->hasMany(Account::class, 'student', 'username');
    }
}
