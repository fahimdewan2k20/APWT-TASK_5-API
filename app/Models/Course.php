<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'course_id',
        'course_name',
        'semester_id',
        'schedule',
        'days',
        'teacher',
        'status'
    ];

    public function getTeacher() {
        return $this->hasOne(Teacher::class, 'username', 'teacher');
    }

    // public function cousesDetails() {
    //     return $this->hasMany(CourseDetails::class, 'course_id', 'course_id');
    // }

    public function students() {
        return $this->hasMany(CourseDetails::class, 'course_id', 'course_id');
    }

    public function grades() {
        return $this->hasMany(Grade::class, 'course_id', 'course_id');
    }

    public function assignments() {
        return $this->hasMany(Assignment::class, 'course_id', 'course_id')->orderBy('upload_time', 'DESC');
    }

    public function lectureNotes() {
        return $this->hasMany(LectureNote::class, 'course_id', 'course_id')->orderBy('time', 'DESC');
    }

    public function notices() {
        return $this->hasMany(Notice::class, 'course_id', 'course_id')->orderBy('upload_time', 'DESC');
    }

    public function getSemester() {
        return $this->hasOne(Semester::class, 'semester_id', 'semester_id');
    }
}
