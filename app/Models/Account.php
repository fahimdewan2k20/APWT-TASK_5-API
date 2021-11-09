<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'student',
        'total_credit',
    ];

    public function getStudent() {
        return $this->belongsTo(Student::class, 'username', 'student');
    }
}
