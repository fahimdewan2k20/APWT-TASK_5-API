<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'upload_time'
    ];

    public function course() {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }
}
