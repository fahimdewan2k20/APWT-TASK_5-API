<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function postNotice(Request $request) {
        $this->validate(
            $request,
            [
                'course_id' => 'required',
                'title' => 'required',
                'description' => 'required'
            ]
        );

        $notice = Notice::create([
            'course_id' => $request->course_id,
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('teacher.notices', ['username' => $request->username, 'course_id' => $request->course_id]);
    }
    
    public function updateNotice(Request $request) {
        $this->validate(
            $request,
            [
                'title' => 'required',
                'description' => 'required'
            ]
        );
        
        $notice = Notice::where('id', $request->notice_id)->first();
        $notice->title = $request->title;
        $notice->description = $request->description;
        $notice->upload_time = Carbon::now()->toDateTimeString();
        $notice->save();

        return redirect()->route('teacher.notices', ['username' => 'fahim', 'course_id' => $notice->course->course_id]);
    }

    public function deleteNotice(Request $request) {
        $notice = Notice::find($request->notice_id);
        $notice->delete();

        return redirect()->route('teacher.notices', ['username' => 'fahim', 'course_id' => $notice->course->course_id]);
    }

    public function getNotices(Request $request) {
        $notices = Course::where('course_id', $request->course_id)->first()->notices;

        return;
    }
}
