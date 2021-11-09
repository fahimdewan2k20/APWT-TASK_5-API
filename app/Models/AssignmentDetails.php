<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentDetails extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'assignment_id',
        'student',
        'file_name',
        'uploaded_at'
    ];

    public function assignment() {
        return $this->belongsTo(Assignment::class, 'assignment_id', 'assignment_id');
    }
}
