<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;
use App\Models\Course;
use DB;
use Session;
use App\Models\CourseDetails;
use App\Models\Account;
use App\Models\Notice;
use App\Models\Assignment;
use App\Models\AssignmentDetails;
use App\Models\Grade;


class StudentController extends Controller
{
    public function registration(){
        $student = session()->get('user');
        $oldcourse=CourseDetails::select('course_id')->where('student',$student)->get();
        $courses= DB::table('courses')->where('status',1)->whereNotIn('course_id',$oldcourse)->get();
        
        return view('pages.student.courseList')->with('courses',$courses);

    }

    public function AddCourse(Request $req){
        $id = $req->id;
        $c =DB::table('courses')->where('id',$id)->first();
        $reg=[];
        
        if(session()->has('reg')){
            $reg = json_decode(session()->get('reg'));
        }


        if(isset($reg[$c->id]))
        {
        return redirect()->route('student.registration')->with('success','Already added this Course');

        }

        if(sizeof($reg)>4)
        {
        return redirect()->route('student.registration')->with('success','You have already taken five courses');

        }
        else
        {

        $course = array('id'=>$id,'course_id'=>$c->course_id,'course_name'=>$c->course_name,'semester'=>$c->semester,'teacher'=>$c->teacher);
        $reg[] = (object)($course);
        $jsonReg = json_encode($reg);
        session()->put('reg',$jsonReg);
        return redirect()->route('student.registration')->with('success','Added successfully');
        }
        
    }

    public function showRegistration(){
        $reg = json_decode(session()->get('reg'));
        return view('pages.student.show')
        ->with('reg',$reg);
    }

    public function confirm(Request $req){
        
        $courses = json_decode(session()->get('reg'));

        //creating order
        $student = session()->get('user');
        

        //creating course details
        foreach($courses as $c){
            $c_d = new CourseDetails();
            $c_d->student = $student;
            $c_d->course_id = $c->course_id;
            $c_d->save();
        }


        // $ac= Account::where('student',$student)->first();
        // $ac->total_credit = $req->total;
        // $ac->save();

        session()->forget('reg');

        return redirect()->route('mycourses');

    }

    public function mycourses(Request $request){
        $student = session()->get('user');
        $CourseDetails = CourseDetails::where('student',$student)->get();
        return view('pages.student.mycourse')->with('CourseDetails',$CourseDetails);
    }

    public function courseDetails(Request $request){
        $id = $request->id;
        $student = session()->get('user');
        $CourseDetails = CourseDetails::where('course_id',$id)->first();
        $assignment = Assignment::where('course_id',$id)->get();
        $assignmentDetails = AssignmentDetails::where('student',$student)->get();
        return view('pages.student.courseDetails')->with('CourseDetails',$CourseDetails)->with('assignmentDetails',$assignmentDetails);
    }

    public function Delete(Request $request)
    {
        $course_id = $request->id;
        $reg = json_decode(session()->get('reg'));
        //session()->forget($reg[$course_id]);
        return redirect()->route('student.showRegistration')->with('success','Deleted successfully');

    }

    public function account()
    {
        $student = session()->get('user');
       $a= account::select('total_credit')->where('student',$student)->get();
       

       return view('pages.student.account')->with('a',$a);

    }

    public function uploadAssignment(Request $request){
        $request->validate(
            [
                'assignment'=> 'required'
            ]
        );
        if($request->hasFile('assignment')){
            $name = time()."_".$request->file('assignment')->getClientOriginalName();
            $request->file('assignment')->storeAs('uploads',$name,'public');

            $student = session()->get('user');

            $a_d = new AssignmentDetails();
            $a_d->assignment_id =$request->d ;

            $a_d->student =  $student;
            $a_d->file_name = $name;
           
           
            $a_d->save();


            return redirect()->route('mycourses');
        }
        return "No file";
    }

    public function notice()
    {
       $notice= Notice::get();
       

       return view('pages.student.notice')->with('notice',$notice);

    }

    public function grade()
    {
        $student = session()->get('user');

       $grade= Grade::where('student',$student)->get();
       //return $grade;
       

       return view('pages.student.grade')->with('grade',$grade);

    }


}
