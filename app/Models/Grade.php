<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'course_id',
        'student',
        'marks'
    ];

    public function courseDetails() {
        return $this->hasOne(Course::class, 'course_id', 'course_id');
    }

    public function student() {
        return $this->belongsTo(Student::class, 'username', 'student');
    }
}
