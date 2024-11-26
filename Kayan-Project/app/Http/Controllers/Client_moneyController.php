<?php

namespace App\Http\Controllers;

use App\Models\Client_money;
use Illuminate\Http\Request;

class Client_moneyController extends Controller
{
    public function Accounts($id){
        $docs= Client_money::where('client_id',$id)->get();
        return view('kayan.managing.clients.ClientMoney',compact('docs'));
    }
    public function AddAcc(request $request){
        $doc = new Client_money();
        $doc->client_id = $request->client_id;
        $doc->rec_amount = $request->rec_amount; 
        $doc->spent_amount = $request->spent_amount; 
        $doc->profit= $doc->rec_amount -  $doc->spent_amount ;
        $doc->notes = $request->notes;
        $doc->save();
        return redirect()->back()->with('success', 'تم إضافة الحساب بنجاح');

}

public function editAcc($id, Request $request)
{
    $doc = Client_money::find($id);
    
    // تحديث المعلومات الأساسية
    $doc->rec_amount = $request->rec_amount; 
    $doc->spent_amount = $request->spent_amount; 
    $doc->profit= $doc->rec_amount -  $doc->spent_amount ;
    $doc->notes = $request->notes;

    // حفظ التعديلات
    $doc->save();

    // العودة مع رسالة نجاح
    return back()->with('success', 'تم تعديل الحساب بنجاح.');
}
public function delAcc($id){
    $doc = Client_money::find($id);
    $doc->delete();
    return redirect()->back()->with('success', 'تم حذف الإقرار بنجاح');

}
}