<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Transaction;

class TransactionController extends Controller
{
    //
    public function transaction(){
        return view('accountant.transaction');
    }
    public function addSubmit(Request $request) {
        $this->validate(
            $request,
            [
                'username'=>'required',
                'amount'=>'required'
            ],
        );
        $var = new  Transaction();
        //$var->username= $request->username;
        $var->student= $request->student;
       // $student=Student::where('username',$request->username)->first();
        $var->amount= $request->amount;
        $var->date= $request->date;
        $var->save();
        return "ok";
    }
}
