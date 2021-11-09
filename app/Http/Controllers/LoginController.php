<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Accountant;
use App\Models\Student;


class LoginController extends Controller

{
    public function login() {
        return view('login')->with('failed', false);
    }
    public function loginSubmit(Request $req) {
        $u = User::where('username', $req->username)
                ->where('password', $req->password)
                ->first();

        if (!$u) {
            return view('login')->with('failed', true);
        }
        
        
        session()->put('user', $u->username);
        session()->put('identity', $u->identity);
        
        if($u['identity'] == 1) {
            return view('admin.index');
        }
        
        if($u['identity'] == 2) {
            return redirect()->route('teacher.home', ['username' => $u->username]);
        }
        
        if($u['identity'] == 3) {
            $accountant = Accountant::where('username',$req->username)->first();
            return redirect()->route('index');
        }

        if($u['identity'] == 4) {
            $student = Student::where('username',$req->username)->first();
            return redirect()->route('mycourses');;

        }
    }

    public function logout(){
        session()->flush();
        return redirect()->route('login');
    }
    
    /*public function changepass(){

        return view('changepass');

    } */

    /*public function changepass(Request $request){
        $user = User::find($request->id);
    
        return view('changepass')->with('user', $user);
    } */
}
