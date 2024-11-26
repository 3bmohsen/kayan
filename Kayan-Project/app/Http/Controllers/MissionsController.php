<?php

namespace App\Http\Controllers;

use App\Models\Missions;
use Illuminate\Http\Request;

class MissionsController extends Controller
{
    public function show(){
        $missions = Missions::all();
        return view('kayan.managing.clients.addclient',compact('missions'));
    }
    public function del(Request $request){
        $missions = Missions::find($request->id);
        $missions-> delete();
        return back()->with('success','تم حذف المأمورية بنجاح.');
        }
    public function Insert(Request $request){
        $mission = new Missions;
        $mission->mission_name = $request->mission_name;
        $mission->save();
        return back()->with('success','تم إضافة المأمورية بنجاح.');
    }
}
