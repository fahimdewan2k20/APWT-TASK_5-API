<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LectureNote;

class LectureNoteController extends Controller
{
    public function uploadNote(Request $request) {
        $this->validate(
            $request,
            [
                'course_id' => 'required',
                'lecture_name' => 'required',
                'file_name' => 'required'
            ]
        );

        if($request->hasFile('file_name')){
            $file_name = time()."_".$request->file('file_name')->getClientOriginalName();
            $request->file('file_name')->storeAs('uploads', $file_name, 'public');
        }

        $note = LectureNote::create([
            'course_id' => $request->course_id,
            'lecture_name' => $request->lecture_name,
            'file_name' => $file_name
        ]);

        return redirect()->route('teacher.notes', ['username' => 'fahim', 'course_id' => $request->course_id]);
    }
    
    public function updateNote(Request $request) {
        $this->validate(
            $request,
            [
                'lecture_name' => 'required',
                'file_name' => 'required'
            ]
        );

        $note = LectureNote::find($request->note_id)->first();
        $note->lecture_name = $request->lecture_name;
        $note->file_name = $request->file_name;
        $note->save();

        return redirect()->route('teacher.notice', ['username' => 'fahim', 'course_id' => $note->course->course_id]);
    }

    public function deleteNote(Request $request) {
        $note = LectureNote::find($request->notice_id);
        $note->delete();

        return redirect()->route('teacher.note', ['username' => 'fahim', 'course_id' => $note->course->course_id]);
    }

    public function getNotes(Request $request) {
        $notes = Course::where('course_id', $request->course_id)->first()->notes;

        return;
    }
}
