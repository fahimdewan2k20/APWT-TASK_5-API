<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaveApplicationController extends Controller
{
    public function leaveApplication(Request $request) {
        $this->validate(
            $request, 
            [
                'start_date' => 'required',
                'days_to_leave' => 'required',
                'reason' => 'required'
            ],
            [
                'start_date.required' => 'Please select from when you want to leave',
                'days_to_leave.required' => 'Please select days you want to leave',
                'reason.required' => 'Please give a reason for your leave'
            ]
        );

        if ($request->start_date < time()) {
            return view()->with('start_date_error', '');
        }

        $leaveApplication = new LeaveApplication;
        $leaveApplication->teacher = $request->teacher;
        $leaveApplication->start_date = $requst->start_date;
        $leaveApplication->days_to_leave = $request->end_date;
        $leaveApplication->reason = $requst->reason;
        $leaveApplication->save();

        return;
    }

    public function updateLeaveApplication(Request $request) {
        $this->validate(
            $request, 
            [
                'start_date' => 'required',
                'days_to_leave' => 'required',
                'reason' => 'required'
            ],
            [
                'start_date.required' => 'This filed cannot be empty',
                'days_to_leave.required' => 'This field cannot be empty',
                'reason.required' => 'This field cannot be empty'
            ]
        );

        $leaveApplication = LeaveApplication::where('application_no', $request->application_no)->first();

        if ($leaveApplication->status == 2) {
            return false;
        }

        $leaveApplication->start_date = $request->start_date;
        $leaveApplication->days_to_leave = $request->end_date;
        $leaveApplication->reason = $request->reason;
        $leaveApplication->save();

        return;
    }

    public function deleteLeaveApplication(Request $request) {
        $leaveApplication = LeaveApplication::where('application_no', $request->application_no)->first();

        if ($leaveApplication->status != 0) {
            return false;
        }

        $leaveApplication->delete();

        return;
    }
}
