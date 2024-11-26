<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminsController extends Controller
{
    public function newAdmin(Request $request){
        $admin = new Admins;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);

        $admin->save();
        return redirect()->back()->with('success', 'تم إضافة المدير بنجاح.');

    }
    public function editAdmin($id,Request $request){
        $admin =Admins::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        if($request->password){
            $admin->password = Hash::make($request->password);
    
            }
        $admin->save();
        return redirect()->back()->with('success', 'تم تعديل المدير بنجاح.');

    }
    public function delAdmin($id,Request $request){
        $admin =Admins::find($id);
        $admin->delete();
        return redirect()->back()->with('success', 'تم حذف المدير بنجاح.');

    }

    public function login(Request $request)
    {
        $admin = Admins::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Auth::guard('admins')->login($admin);
            Auth::guard('data_manager')->logout();
            Auth::guard('employees')->logout();

            return redirect()->intended('/Admins/dashboard');}

        return back()->withErrors([
            'email' => 'الايميل او الباسورد خطأ',
        ]);
    }

    public function logout()
    {
        Auth::guard('admins')->logout();
        return redirect('/Admins/Login');
    }
}
