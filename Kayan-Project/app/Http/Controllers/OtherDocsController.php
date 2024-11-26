<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Models\OtherDocs;
use Illuminate\Http\Request;

class OtherDocsController extends Controller
{
    public function docs($id){
        

        if(request()->routeIs('CensorshipDocs')){
            $docs = OtherDocs::where('client_id', $id)
                ->where('filetype', '1')
                ->get();
        return view('kayan.managing.clients.CensorshipDocs',compact('docs'));}

        elseif(request()->routeIs('COCDocs')){
            $docs = OtherDocs::where('client_id', $id)
            ->where('filetype', '2')
            ->get();
            return view('kayan.managing.clients.COCDocs',compact('docs'));}


        elseif(request()->routeIs('CRDocs')){
            $docs = OtherDocs::where('client_id', $id)
            ->where('filetype', '3')
            ->get();
            return view('kayan.managing.clients.CRDocs',compact('docs'));}

        elseif(request()->routeIs('CU2')){
            $docs = OtherDocs::where('client_id', $id)
            ->where('filetype', '4')
            ->get();
            return view('kayan.managing.clients.CU2',compact('docs'));}

        elseif(request()->routeIs('tradeDocs')){
            $docs = OtherDocs::where('client_id', $id)
            ->where('filetype', '5')
            ->get();
            return view('kayan.managing.clients.tradeDocs',compact('docs'));}
        }

        public function AddDoc(Request $request){
            $filetype = $request->filetype;
            $doc = new OtherDocs;
            $doc->client_id = $request->client_id;
            
      if ($request->hasFile('doc_file')) {
    $doc->file_path = $request->file('doc_file')->store('docs', 'public');  // تخزين مسار الملف في قاعدة البيانات
    $doc->file_name = $request->file('doc_file')->getClientOriginalName();   // تخزين اسم الملف
} else {
    $doc->file_path = null;  // تعيين الحقل كـ null إذا لم يتم رفع ملف
    $doc->file_name = null;  // تعيين اسم الملف كـ null إذا لم يتم رفع ملف
}
            $doc->notes = $request->notes;
            $doc->workDate = $request->workDate;
            $doc->filetype = $filetype;
            $doc->recDate = $request->recDate;

            $doc->save();
            if($filetype == '1'){
                return redirect('/CensorshipDocs/' . $doc->client_id)->with('success', 'تم إضافة المستند بنجاح');            
            }
            elseif($filetype == '2'){
                return redirect('/COCDocs/' . $doc->client_id)->with('success', 'تم إضافة المستند بنجاح');            

            }
            elseif($filetype == '3'){
                return redirect('/CRDocs/' . $doc->client_id)->with('success', 'تم إضافة المستند بنجاح');            

            }
            elseif($filetype == '4'){
                return redirect('/CUUDocs/' . $doc->client_id)->with('success', 'تم إضافة المستند بنجاح');            

            }
            elseif($filetype == '5'){
                return redirect('/tradeDocs/' . $doc->client_id)->with('success', 'تم إضافة المستند بنجاح');            

            }
        }

        public function editDoc($id, Request $request){
            $doc = OtherDocs::find($id);
            $doc->notes = $request->notes;
            $doc->workDate = $request->workDate;
            $doc->recDate = $request->recDate;

            if ($request->hasFile('doc_file')) {
                if($doc->file_path != null){
                    Storage::disk('public')->delete($doc->file_path);
                }
            $doc->file_path = $request->file('doc_file')->store('docs', 'public');;  // تخزين مسار الملف في قاعدة البيانات
                $doc->file_name = $request->file('doc_file')->getClientOriginalName(); // تخزين اسم الملف
            } else {
                // إذا لم يتم رفع ملف، استخدم اسم الملف الموجود في الـ input
                $doc->file_name = $request->doc_name;
            }
            $doc->save();
        
            // العودة مع رسالة نجاح
            return back()->with('success', 'تم تعديل المستند بنجاح.');
        }

        public function deldoc($id){
            $doc = OtherDocs::find($id);
                if($doc->file_path != null){
                Storage::disk('public')->delete($doc->file_path);
            }        $doc->delete();
            return back()->with('success', 'تم حذف المستند بنجاح');
        }


        
}

