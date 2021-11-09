<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'username',
        'email',
        'password',
        'identity'
    ];

    public function getStudent() {
        return $this->hasOne(Student::class, 'username', 'username');
    }

    public function getTeacher() {
        return $this->hasOne(Teacher::class, 'username', 'username');
    }

    public function getAccountant() {
        return $this->hasOne(Accountant::class, 'username', 'username');
    }
}
