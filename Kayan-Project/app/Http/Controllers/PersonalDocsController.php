<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Models\PersonalDocs;
use Illuminate\Http\Request;

class PersonalDocsController extends Controller
{
    public function docs($id){
        

        if(request()->routeIs('TaxCard')){
            $docs = PersonalDocs::where('client_id', $id)
                ->where('filetype', '1')
                ->get();
        return view('kayan.managing.clients.TaxCard',compact('docs'));}

        elseif(request()->routeIs('ComLog')){
            $docs = PersonalDocs::where('client_id', $id)
            ->where('filetype', '2')
            ->get();
            return view('kayan.managing.clients.ComLog',compact('docs'));}


        elseif(request()->routeIs('AddedVal')){
            $docs = PersonalDocs::where('client_id', $id)
            ->where('filetype', '3')
            ->get();
            return view('kayan.managing.clients.AddedVal',compact('docs'));}

        elseif(request()->routeIs('ImportCard')){
            $docs = PersonalDocs::where('client_id', $id)
            ->where('filetype', '4')
            ->get();
            return view('kayan.managing.clients.ImportCard',compact('docs'));}

        elseif(request()->routeIs('ExportCard')){
            $docs = PersonalDocs::where('client_id', $id)
            ->where('filetype', '5')
            ->get();
            return view('kayan.managing.clients.ExportCard',compact('docs'));}

        elseif(request()->routeIs('CU')){
            $docs = PersonalDocs::where('client_id', $id)
            ->where('filetype', '6')
            ->get();
            return view('kayan.managing.clients.CU',compact('docs'));}
        elseif(request()->routeIs('courses')){
            $docs = PersonalDocs::where('client_id', $id)
            ->where('filetype', '7')
            ->get();
            return view('kayan.managing.clients.courses',compact('docs'));}
        elseif(request()->routeIs('Sessions')){
            $docs = PersonalDocs::where('client_id', $id)
            ->where('filetype', '8')
            ->get();
            return view('kayan.managing.clients.sessions',compact('docs'));}
        }

        public function AddDoc(Request $request){
            $filetype = $request->filetype;
            $doc = new PersonalDocs;
            $doc->client_id = $request->client_id;
            if ($request->hasFile('doc_file')) {
                $doc->file_path = $request->file('doc_file')->store('docs', 'public');  // تخزين مسار الملف في قاعدة البيانات
                $doc->file_name = $request->file('doc_file')->getClientOriginalName();   // تخزين اسم الملف
            } else {
                $doc->file_path = null;  // تعيين الحقل كـ null إذا لم يتم رفع ملف
                $doc->file_name = null;  // تعيين اسم الملف كـ null إذا لم يتم رفع ملف
            }
            $doc->notes = $request->notes;
            $doc->expDate = $request->expDate;
            $doc->filetype = $filetype;
            $doc->save();
            if($filetype == '1'){
                return redirect('/TaxCards/' . $doc->client_id)->with('success', 'تم إضافة المستند بنجاح');            
            }
            elseif($filetype == '2'){
                return redirect('/CommercialRegistry/' . $doc->client_id)->with('success', 'تم إضافة المستند بنجاح');            

            }
            elseif($filetype == '3'){
                return redirect('/AddedVal/' . $doc->client_id)->with('success', 'تم إضافة المستند بنجاح');            

            }
            elseif($filetype == '4'){
                return redirect('/ImportCard/' . $doc->client_id)->with('success', 'تم إضافة المستند بنجاح');            

            }
            elseif($filetype == '5'){
                return redirect('/ExportCard/' . $doc->client_id)->with('success', 'تم إضافة المستند بنجاح');            

            }
            elseif($filetype == '6'){
                return redirect('/ContractorsUnion/' . $doc->client_id)->with('success', 'تم إضافة المستند بنجاح');            

            }
            elseif($filetype == '7'){
                return redirect('/Courses/' . $doc->client_id)->with('success', 'تم إضافة الدورة بنجاح');            

            }
            elseif($filetype == '8'){
                return redirect('/Sessions/' . $doc->client_id)->with('success', 'تم إضافة الجلسة بنجاح');            

            }
        }

        public function editDoc($id, Request $request){
            $doc = PersonalDocs::find($id);
            $doc->notes = $request->notes;
            $doc->expDate = $request->expDate;
            if ($request->hasFile('doc_file')) {
            if($doc->file_path != null){
                Storage::disk('public')->delete($doc->file_path);
            }            $doc->file_path = $request->file('doc_file')->store('docs', 'public');;  // تخزين مسار الملف في قاعدة البيانات
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
            $doc = PersonalDocs::find($id);
                if($doc->file_path != null){
                Storage::disk('public')->delete($doc->file_path);
            }        $doc->delete();
            return back()->with('success', 'تم حذف المستند بنجاح');
        }


        
}
