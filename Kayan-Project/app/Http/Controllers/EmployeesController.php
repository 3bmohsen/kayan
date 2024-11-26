<?php

namespace App\Http\Controllers;
use App\Models\Emp_notf;
use App\Models\Employees;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function makrkread(Request $request)
    {
        $readedIds = $request->input('readed'); // هذه ستكون مصفوفة تحتوي على IDs
        if ($readedIds) {
            // قم بتحديث الإشعارات لتحديدها كمقروءة
            Emp_notf::whereIn('id', $readedIds)->update(['is_read' => true]);
        }
        
        return redirect()->back()->with('success', 'تم تمييز الإشعارات كمقروءة بنجاح.');
    }

    public function insert(Request $request){
        $employee = new Employees();
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->password = Hash::make($request->password); // تشفير كلمة المرور
        $employee->save();
        return redirect('/ShowEmployees' )->with('success', 'تم إضافة الموظف بنجاح.');
    }
    public function editemp($id,Request $request){
        $employee = Employees::find($id);
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        if($request->password){
        $employee->password = Hash::make($request->password); // تشفير كلمة المرور

        }

        $employee->save();
        return redirect()->back()->with('success', 'تم تعديل الموظف بنجاح.');
    }
    public function delemp($id){
        $employee = Employees::find($id);
        $employee->delete();
        return back()->with('success', 'تم حذف الموظف بنجاح.');
    }
    public function empshow($id){
        $employee = Employees::find($id);
        return view('kayan.managing.employees.Eprofile',compact('employee'));
    }
    public function login(Request $request)
    {
        $employee = Employees::where('email', $request->email)->first();

        if ($employee && Hash::check($request->password, $employee->password)) {
            Auth::guard('employees')->login($employee);
            Auth::guard('data_manager')->logout();
            Auth::guard('admins')->logout();            

            return redirect()->intended('/MyJobs/'.Auth::guard('employees')->id());}

        return back()->withErrors([
            'email' => 'الايميل او الباسورد خطأ',
        ]);
    }

    public function logout()
    {
        Auth::guard('employees')->logout();
        return redirect('/Employee/Login');
    }
}