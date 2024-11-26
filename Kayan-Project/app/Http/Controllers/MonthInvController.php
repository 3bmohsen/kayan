<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Models\MonInv;
use Illuminate\Http\Request;

class MonthInvController extends Controller
{
    public function store(Request $request){
        $inv = new MonInv;
        $inv->client_id = $request->client_id;
        $inv->Mondoc_id  = $request->Mondoc_id;
        $inv->type = $request->type;
        $inv->invoice_path =  $request->file('doc_file')->store('docs', 'public');  // تخزين مسار الملف في قاعدة البيانات
        $inv->invoice_name = $request->file('doc_file')->getClientOriginalName();
        $inv->save();
        return back()->with('success','تم إضافة الفاتورة بنجاح');
    }

    public function deldoc($id){
        $doc = MonInv::find($id);
            if($doc->file_path != null){
                Storage::disk('public')->delete($doc->file_path);
            }        $doc->delete();
        return back()->with('success', 'تم حذف المستند بنجاح');
    }
}
