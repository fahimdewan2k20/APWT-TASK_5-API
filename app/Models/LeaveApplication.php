<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveApplication extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'application_no',
        'teacher',
        'start_date',
        'days_to_leave',
        'application_time',
        'reason',
        'status'
    ];

    public function teacher() {
        return $this->belongsTo(Teacher::class, 'username', 'teacher');
    }
}
