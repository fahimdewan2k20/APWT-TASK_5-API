<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\AssignmentDetails;

class AssignmentController extends Controller
{
    public function createAssignment(Request $request) {
        $this->validate(
            $request,
            [
                'course_id' => 'required',
                'assignment_name' => 'required',
                'description' => 'required',
                'due_time' => 'required|time'
            ]
        );

        $assignment = new Assignment;
        $assignment->course_id = $request->course_id;
        $assignment->assignment_name = $request->assignment_name;
        $assignment->description = $request->description;
        $assignment->due_time = $request->due_time;
        $assignment->save();

        return;
    }

    public function updateAssignment(Request $request) {
        $this->validate(
            $request,
            [
                'assignment_name' => 'required',
                'description' => 'required',
                'due_time' => 'required|time'
            ]
        );

        $assignment = Assignment::where('assignment_id', $request->assignment_id)->first();
        $assignment->assignment_name = $request->assignment_name;
        $assignment->description = $request->description;
        $assignment->due_time = $request->due_time;
        $assignment->save();

        return;
    }

    public function deleteAssignment(Request $request) {
        $assignment = Assignment::whehe('assignment_id', $request->assignment_id)->first();
        $assignment->delete();

        return;
    }

    public function uploadAssignment(Request $request) {
        $assignmentDetails = AssignmentDetails::create([
            'assignment_id' => $request->assignment_id,
            'student' => $request->student,
            'file_name' => $request->file_name
        ]);

        return;
    }

    public function getAssignmentsByCourse(Request $request) {
        $assignments = Assignment::where('course_id', $request->course_id)->first()->assignmentDetails;

        return;
    }
}
