<?php

namespace App\Http\Controllers;

use App\Models\G_Money;
use Illuminate\Http\Request;

class GenralMoneyController extends Controller
{

    public function insert(Request $request)
    {
        $money = new G_Money();
        $money->money = $request->money;
        $money->notes = $request->notes;
        $money->date = $request->date;
        $money->save();
        return redirect()->back()->with('success', 'تم إضافة الحساب بنجاح');
    }

    public function edit($id, Request $request)
    {
        $money = G_Money::find($id);
        $money->money = $request->money;
        $money->notes = $request->notes;
        $money->date = $request->date;
        $money->save();
        return redirect()->back()->with('success', 'تم تعديل الحساب بنجاح');
    }

    public function delete($id)
    {
        $money = G_Money::find($id);
        $money->delete();
        return redirect()->back()->with('success', 'تم حذف الحساب بنجاح');
    }
}
