<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LectureNote extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'course_id',
        'lecture_name',
        'file_name',
        'time'
    ];

    public function course() {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }
}
