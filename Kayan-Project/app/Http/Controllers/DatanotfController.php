<?php

namespace App\Http\Controllers;

use App\Mail\Admin_message;
use App\Mail\ExpiringFileNotification;
use App\Models\Clients;
use App\Models\Data_manager;
use App\Models\notf;
use Illuminate\Http\Request;
use Mail;

class DatanotfController extends Controller
{

    public function New_Notfication(Request $request){
        $not = new notf;
        $not->message = $request->message;
        $not->is_read = 'false';

        $not->save();
        $emails = Data_manager::pluck('email')->toArray();
                Mail::to($emails)->send(new Admin_message($request->message));

        return redirect('/Admins/allDatanotf')->with('success','تم إرسال الإشعار بنجاح');

    }
    public function editnot($id,Request $request){
        $notf = notf::find($id);
        $notf->message = $request->message;
        $notf->save();
        return redirect('/Admins/allDatanotf')->with('success','تم التعديل بنجاح');
    }
    public function delnot($id){
        $notf = notf::find($id);
        $notf->delete();
        return redirect('/Admins/allDatanotf')->with('success','تم الحذف بنجاح');
    }
}
