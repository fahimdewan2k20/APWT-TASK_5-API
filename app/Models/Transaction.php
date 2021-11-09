<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'transaction_id',
        'student',
        'amount',
        'time'
    ];

    public function student() {
        return $this->hasOne(Student::class, 'username', 'student');
    }
}
