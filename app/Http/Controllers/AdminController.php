<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Accountant;
use App\Models\Teacher;
use App\Models\User;

class AdminController extends Controller
{
    public function Home(){
        return view('admin.home');
    }
    public function Index(){
        return view('admin.index');
    }

    public function AddUser(){
        return view('admin.addUser');
    }


    public function AddUserSubmit(Request $request){
        $this->validate(
            $request,
            [
                'username'=>'required',
                'email'=>'required',
                'password'=>'required',
                'identity'=>'required'
            ],
            [
                'name.required'=>'Please put your name',
            ]
        );
            $var = new  User();
            $var->username= $request->username;
            $var->email=$request->email;
            $var->password=$request->password;
            $var->identity = $request->identity;
            $var->save();

        // if($request->department_name=="Accountant"){
        //     $var = new  Accountant();
        //     $var->username= $request->username;
        //     $var->fullname = $request->fullname;
        //     $var->phone=$request->phone;
        //     $var->address=$request->address;
        //     $var->dob = $request->dob;
        //     $var->department_name = $request->department_name;
        //     $var->save();
        // }
        // else if($request->department_name=="Teacher"){
        //     $var = new  Teacher();
        //     $var->username= $request->username;
        //     $var->fullname = $request->fullname;
        //     $var->phone=$request->phone;
        //     $var->address=$request->address;
        //     $var->dob = $request->dob;
        //     $var->department_name = $request->department_name;
        //     $var->save();
        // }



        return redirect()->route('adduser');  
    }
    
    
}
