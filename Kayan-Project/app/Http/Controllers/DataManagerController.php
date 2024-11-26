<?php

namespace App\Http\Controllers;

use App\Models\Data_manager;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataManagerController extends Controller
{

    public function newD(Request $request){
        $DataManager = new Data_manager;
        $DataManager->name = $request->name;
        $DataManager->email = $request->email;
        $DataManager->phone = $request->phone;
        $DataManager->password = Hash::make($request->password);

        $DataManager->save();
        return redirect()->back()->with('success', 'تم إضافة السكرتيرة بنجاح.');

    }
    public function editD($id,Request $request){
        $DataManager =Data_manager::find($id);
        $DataManager->name = $request->name;
        $DataManager->email = $request->email;
        $DataManager->phone = $request->phone;
        if($request->password){
            $DataManager->password = Hash::make($request->password);
    
            }
        $DataManager->save();
        return redirect()->back()->with('success', 'تم تعديل السكرتيرة بنجاح.');

    }
    public function delD($id,Request $request){
        $admin =Data_manager::find($id);
        $admin->delete();
        return redirect()->back()->with('success', 'تم حذف السكرتيرة بنجاح.');

    }
    public function login(Request $request)
    {
        $employee = Data_manager::where('email', $request->email)->first();

        // التحقق إذا كان البريد الإلكتروني وكلمة المرور صحيحين
        if ($employee && Hash::check($request->password, $employee->password)) {
            Auth::guard('data_manager')->login($employee);
            Auth::guard('employees')->logout();

            return redirect()->intended('/ShowClients');
        }

        return back()->withErrors([
            'email' => 'الايميل او الباسورد خطأ',
        ]);
    }
    public function logout()
    {
        Auth::guard('data_manager')->logout();
        return redirect('/DataManager/login');
    }
}
