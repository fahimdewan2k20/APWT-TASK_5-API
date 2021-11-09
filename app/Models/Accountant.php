<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accountant extends Model
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
        'dob'
    ];

    public function getUser() {
        return $this->belongsTo(User::class, 'username', 'username');
    }
   
}
