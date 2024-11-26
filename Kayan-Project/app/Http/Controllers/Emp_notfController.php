<?php

namespace App\Http\Controllers;

use App\Mail\employee_alert;
use App\Models\Emp_notf;
use App\Models\Employees;
use Illuminate\Http\Request;
use Mail;

class Emp_notfController extends Controller
{

    public function sendEmps(){
        $emps = Employees::all();
        return view('kayan.managing.admins.sendEmpNotf',compact('emps'));
    }


    public function newnot(Request $request){
        $notf = new Emp_notf;
        $notf->emp_id = $request->emp_id;
        $notf->message = $request->message;
        $notf->is_read = 'false';
        $notf->save();
        $message = $request->message;
        $emp = Employees::find($request->emp_id);
        Mail::to($emp->email)->send(new employee_alert($message));

        return redirect('/Admins/allEmpnotf')->with('success','تم إرسال الإشعار بنجاح');
    }


    public function editnot($id,Request $request){
        $notf = Emp_notf::find($id);
        $notf->message = $request->message;
        $notf->save();
        return redirect('/Admins/allEmpnotf')->with('success','تم التعديل بنجاح');
    }
    public function delnot($id){
        $notf = Emp_notf::find($id);
        $notf->delete();
        return redirect('/Admins/allEmpnotf')->with('success','تم الحذف بنجاح');
    }
}
