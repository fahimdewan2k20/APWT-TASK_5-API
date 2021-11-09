<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Grade;
use App\Models\LeaveApplication;
use App\Models\LectureNote;

class TeacherController extends Controller
{
    public $days = ['Sunday | Tuesday', 'Monday | Wednesday'];

    public function home(Request $request) {
        $courses = Teacher::where('username', session()->get('user'))->first()->courses;

        return view('pages.teacher.home')->with('courses', $courses)->with('days', $this->days);
    }

    public function profile(Request $request) {
        $teacher = Teacher::where('username', $request->username)->first();

        return view('pages.teacher.profile')->with('teacher', $teacher);
    }

    public function updateProfile(Request $request) {
        $this->validate(
            $request,
            [
                'fullname' => 'required',
                'email' => 'required',
                'phone' => 'required|regex:/^[0-9]+$/',
                'address' => 'required',
                'dob' => 'required|date'
            ]
        );
        $teacher = Teacher::where('username', $request->username)->first();
        $teacher->fullname = $request->fullname;
        $teacher->getUser->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->address = $request->address;
        $teacher->dob = $request->dob;
        $teacher->save();

        return redirect()->route('teacher.profile', ['username' => $teacher->username]);
    }

    public function changePassword(Request $request) {
        if ($request->new_password != $request->verify_password) {
            return redirect()->route('teacher.profile', ['username' => $user->username]);
        }

        $user = User::where('username', $request->username)->first();
        if ($user->password != $request->new_password) {
            return redirect()->route('teacher.profile', ['username' => $user->username]);
        }
        $user->password = $request->new_password;
        $user->save();

        return redirect()->route('teacher.profile', ['username' => $user->username]);
    }

    public function courseDetails(Request $request) {
        $course = Course::where('course_id', $request->course_id)->first();

        return view('pages.teacher.courseDetails')->with('course', $course)->with('days', $this->days);
    }

    public function getAllStudents(Request $request) {
        $course = Course::where('course_id', $request->course_id)->first();

        return view('pages.teacher.studentList')->with('course', $course);
    }

    public function gradeUpload(Request $request) {
        $this->validate(
            $request,
            [
                'marks' => 'min:0|max:100'
            ],
            [
                'marks.min' => 'marks cannot be negative'
            ]
        );
        $grade = Grade::where('id', $request->id)->first();
        $grade->marks = $request->marks;
        $grade->save();

        return redirect()->route('teacher.getStudents', ['username' => $grade->student, 'course_id' => $grade->courseDetails->course_id]);
    }

    public function getAllAssignments(Request $request) {
        $course = Course::where('course_id', $request->course_id)->first();

        return view('pages.teacher.assignments')->with('course', $course);
    }

    public function getAllNotes(Request $request) {
        $course = Course::where('course_id', $request->course_id)->first();

        return view('pages.teacher.notes')->with('course', $course);
    }

    public function getAllNotices(Request $request) {
        $course = Course::where('course_id', $request->course_id)->first();

        return view('pages.teacher.notices')->with('course', $course);
    }
}
