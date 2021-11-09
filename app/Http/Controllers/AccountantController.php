<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accountant;
use App\Models\Student;
use App\Models\User;
use Session;
class AccountantController extends Controller
{
    //
    public function home(){
        return view('accountant.home');
    }
  
   
    public function index(){
        return view('accountant.index');
    }
    public function register(){
        return view('accountant.register');
    }
    public function list(){
        
        $students = Student::all();
        return view('accountant.list')->with('students',$students);
    }
    
        //
        public function registerSubmit(Request $request){
            $this->validate(
                $request,
                [
                    'username'=>'required',
                    'fullname'=>'required',
                    'email'=>'required',
                    'phone'=>'required',
                    'address'=>'required',
                    'dob'=>'required',
                    'department_name'=>'required',
                    'admission_time'=>'required',
                    'password'=>'required'


                ],
                [
                    'name.required'=>'Please put your name',
                ]
            );
    
            $var = new  Student();
            $var->username= $request->username;
            $var->fullname = $request->fullname;
            $var->phone=$request->phone;
            $var->address=$request->address;
            $var->dob = $request->dob;
            $var->department_name = $request->department_name;
            $var->admission_time = $request->admission_time;
            $var->save();
    
            $user = new User();
            $user->username= $request->username;
            $user->email= $request->email;
            $user->password= $request->password;
            $user->identity= 4;

            $user->save();
            

            return redirect()->route('list');  
        }


     
     public function profile(Request $request){
         
        
        $accountant = Accountant::find($request->id);
    
        
        return view('accountant.profile')->with('accountant', $accountant);
        
    }

    public function updateSubmit(Request $request,$id){
        //$var = new Accountant();
        //$var = Accountant::where('id',$request->id)->first();
        $var= Accountant::find($id);
        $var->username= $request->username;
        $var->fullname = $request->fullname;
        $var->phone=$request->phone;
        $var->address=$request->address;
        $var->dob = $request->dob;
        $var->save();

        return redirect()->route('index')->with('success','Successfully updated');
    }
}
