<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Addedval;

use Illuminate\Http\Request;

class AddedvalController extends Controller
{
    public function docs($id){
        

        if(request()->routeIs('monthlyDocs')){
            $docs = Addedval::where('client_id', $id)
                ->where('filetype', '1')
                ->get();
        return view('kayan.managing.clients.monthlyDocs',compact('docs'));}

        elseif(request()->routeIs('incomeTaxDocs')){
            $docs = Addedval::where('client_id', $id)
            ->where('filetype', '2')
            ->get();
            return view('kayan.managing.clients.incomeTaxDocs',compact('docs'));}


        elseif(request()->routeIs('CAIPtaxDocs')){
            $docs = Addedval::where('client_id', $id)
            ->where('filetype', '3')
            ->get();
            return view('kayan.managing.clients.CAIPtaxDocs',compact('docs'));}
        }
        
    public function AddCIAPtaxDoc(request $request){
        ini_set('memory_limit', '2048M');
        $doc = new Addedval();
        $doc->client_id = $request->client_id;
if ($request->hasFile('doc_file')) {
    $doc->doc_path = $request->file('doc_file')->store('docs', 'public');  // تخزين مسار الملف في قاعدة البيانات
    $doc->doc_name = $request->file('doc_file')->getClientOriginalName();   // تخزين اسم الملف
} else {
    $doc->doc_path = null;  // تعيين الحقل كـ null إذا لم يتم رفع ملف
    $doc->doc_name = null;  // تعيين اسم الملف كـ null إذا لم يتم رفع ملف
}
        $doc->notes = $request->notes;
        $doc->filetype = '3';
        $doc->save();
        return redirect('/CAIPtaxDocs/' . $doc->client_id)->with('success', 'تم إضافة الإقرار بنجاح');

    
    }
    public function addIncomeTaxDoc(request $request){
        ini_set('memory_limit', '2048M');
        $doc = new Addedval();
        $doc->client_id = $request->client_id;
if ($request->hasFile('doc_file')) {
    $doc->doc_path = $request->file('doc_file')->store('docs', 'public');  // تخزين مسار الملف في قاعدة البيانات
    $doc->doc_name = $request->file('doc_file')->getClientOriginalName();   // تخزين اسم الملف
} else {
    $doc->doc_path = null;  // تعيين الحقل كـ null إذا لم يتم رفع ملف
    $doc->doc_name = null;  // تعيين اسم الملف كـ null إذا لم يتم رفع ملف
}
        $doc->notes = $request->notes;
        $doc->filetype = '2';
        $doc->save();
        return redirect('/incomeTaxDocs/' . $doc->client_id)->with('success', 'تم إضافة الإقرار بنجاح');

    
    }
    
    public function AddMonDoc(request $request){
        ini_set('memory_limit', '2048M');
        $doc = new Addedval();
        $doc->client_id = $request->client_id;
if ($request->hasFile('doc_file')) {
    $doc->doc_path = $request->file('doc_file')->store('docs', 'public');  // تخزين مسار الملف في قاعدة البيانات
    $doc->doc_name = $request->file('doc_file')->getClientOriginalName();   // تخزين اسم الملف
} else {
    $doc->doc_path = null;  // تعيين الحقل كـ null إذا لم يتم رفع ملف
    $doc->doc_name = null;  // تعيين اسم الملف كـ null إذا لم يتم رفع ملف
}
        $doc->notes = $request->notes;
        $doc->filetype = '1';
        $doc->save();
        return redirect('/monthlyDocs/' . $doc->client_id)->with('success', 'تم إضافة الإقرار بنجاح');

    }
    public function deldoc($id){
        $doc = Addedval::find($id);
            if($doc->doc_path != null){
                Storage::disk('public')->delete($doc->doc_path);
            }        $doc->delete();
        return back()->with('success', 'تم حذف الإقرار بنجاح');

    }
    public function editDoc($id, Request $request)
    {

        $filetype = $request->filetype;

        if($filetype == '1'){
            $doc = Addedval::find($id);
            $doc->notes = $request->notes;
            if ($request->hasFile('doc_file')) {
                if($doc->doc_path != null){
                    Storage::disk('public')->delete($doc->doc_path);

                }
                            $doc->doc_path = $request->file('doc_file')->store('docs', 'public');;  // تخزين مسار الملف في قاعدة البيانات
                $doc->doc_name = $request->file('doc_file')->getClientOriginalName(); // تخزين اسم الملف
            } else {
                // إذا لم يتم رفع ملف، استخدم اسم الملف الموجود في الـ input
                $doc->doc_name = $request->doc_name;
            }

            if ($request->hasFile('invoice_file')) {
                $doc->invoice_path = $request->file('invoice_file')->store('docs', 'public');;  // تخزين مسار الملف في قاعدة البيانات
                $doc->invoice_name = $request->file('invoice_file')->getClientOriginalName(); // تخزين اسم الملف
            } else {
                // إذا لم يتم رفع ملف، استخدم اسم الملف الموجود في الـ input
                $doc->invoice_name = $request->invoice_name;
            }

                        // حفظ التعديلات
            $doc->save();
        
            // العودة مع رسالة نجاح
            return back()->with('success', 'تم تعديل الإقرار بنجاح.');


        }

        if($filetype == '2'){
            $doc = Addedval::find($id);
            $doc->notes = $request->notes;
            if ($request->hasFile('doc_file')) {
            Storage::disk('public')->delete($doc->doc_path);                $doc->doc_path = $request->file('doc_file')->store('docs', 'public');;  // تخزين مسار الملف في قاعدة البيانات
                $doc->doc_name = $request->file('doc_file')->getClientOriginalName(); // تخزين اسم الملف
            } else {
                // إذا لم يتم رفع ملف، استخدم اسم الملف الموجود في الـ input
                $doc->doc_name = $request->doc_name;
            }

                        // حفظ التعديلات
            $doc->save();
        
            // العودة مع رسالة نجاح
            return back()->with('success', 'تم تعديل الإقرار بنجاح.');


        }
        
    

    }

}
