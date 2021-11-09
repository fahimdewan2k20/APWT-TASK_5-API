<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class TeacherControllerAPI extends Controller
{
    public function getAllNotices(Request $request) {
        $notices = Course::where('course_id', $request->course_id)->first()->notices;

        return $notices;
    }
}
