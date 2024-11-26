<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Models\CheckPeriods;
use Illuminate\Http\Request;

class CheckPeriodsController extends Controller
{
    public function docs($id){
        $docs= CheckPeriods::where('client_id',$id)->get();
        return view('kayan.managing.clients.checkPeriods',compact('docs'));
    }
    public function AddCheckPeriod(request $request){
        ini_set('memory_limit', '2048M');
        $doc = new CheckPeriods();
        $doc->client_id = $request->client_id;
      if ($request->hasFile('doc_file')) {
    $doc->file_path = $request->file('doc_file')->store('docs', 'public');  // تخزين مسار الملف في قاعدة البيانات
    $doc->file_name = $request->file('doc_file')->getClientOriginalName();   // تخزين اسم الملف
} else {
    $doc->file_path = null;  // تعيين الحقل كـ null إذا لم يتم رفع ملف
    $doc->file_name = null;  // تعيين اسم الملف كـ null إذا لم يتم رفع ملف
}
        $doc->sub_date= $request->sub_date;
        $doc->notes = $request->notes;
        $doc->save();
        return redirect('/CheckPeriods/' . $doc->client_id)->with('success', 'تم إضافة الإقرار بنجاح');

    }
    public function deldoc($id){
        $doc = CheckPeriods::find($id);
        if($doc->file_path != null){
            Storage::disk('public')->delete($doc->file_path);

        }
        $doc->delete();
        return redirect('/CheckPeriods/'.$doc->client_id)->with('success', 'تم حذف الإقرار بنجاح');

    }
    public function editDoc($id, Request $request)
    {
        $doc = CheckPeriods::find($id);
        
        // تحديث المعلومات الأساسية
        $doc->sub_date = $request->sub_date;
        $doc->notes = $request->notes;
    
        // التحقق من وجود ملف مرفوع
        if ($request->hasFile('doc_file')) {
            if($doc->file_path != null){
                Storage::disk('public')->delete($doc->file_path);
            }            $doc->file_path = $request->file('doc_file')->store('docs', 'public');;  // تخزين مسار الملف في قاعدة البيانات
            $doc->file_name = $request->file('doc_file')->getClientOriginalName(); // تخزين اسم الملف
        } else {
            // إذا لم يتم رفع ملف، استخدم اسم الملف الموجود في الـ input
            $doc->file_name = $request->fileName;
        }
    
        // حفظ التعديلات
        $doc->save();
    
        // العودة مع رسالة نجاح
        return back()->with('success', 'تم تعديل الإقرار بنجاح.');
    }

}
