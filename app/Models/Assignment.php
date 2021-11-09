<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'assignment_id',
        'course_id',
        'assignment_name',
        'description',
        'due_time',
        'upload_time'
    ];

    public function assignmentDetails() {
        return $this->hasMany(AssignmentDetails::class, 'assignment_id', 'assignment_id');
    }

    public function course() {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }

    public function student() {
        return $this->hasMany(Student::class, 'username', 'student');
    }
}
