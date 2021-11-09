<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;

class CourseController extends Controller
{
    public function Course(){

        $r = Teacher::select('id','username')->get();
        return view('admin.course')->with('r', $r);
    }


    public function CourseSubmit(Request $request){
        $this->validate(
            $request,
            [
                'courseid'=>'required',
                'coursename'=>'required',       
                'status'=>'required'

            ],
            [
                'name.required'=>'Please put your name',
            ]
        );
        

        $var = new  Course();
        $var->course_name= $request->coursename;
        $var->course_id=$request->courseid;
        $var->semester=$request->semester;
        $var->teacher = $request->teacher;
        $var->schedule = $request->schedule;
        $var->days = $request->days;
        $var->status = $request->status;
        $var->save();

           return redirect()->route('course');
       

    }

    public function showuser(){
        $courses = Course::all();
        return view('Admin.list')->with('list', $courses);
    }

    public function edit($id){
         $course = Course::find($id);
         //print_r($course);
         return view('admin.edit')->with('course', $course);
    }

    public function Delete($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect()->route('list');
    }

    public function editSubmit(Request $request, $id)
    {
        $var= Course::find($id);
        $var->course_name= $request->coursename;
        $var->course_id=$request->courseid;
        $var->semester=$request->semester;
        $var->teacher = $request->teacher;
        $var->status = $request->status;

        $var->save();
        return redirect()->route('list');
    }
}
