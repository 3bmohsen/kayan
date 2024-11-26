<?php

namespace App\Http\Controllers;
use App\Models\ClientAccs;
use App\Models\Clients;
use App\Models\notf;
use Illuminate\Http\Request;

class ClientsController extends Controller
{

    public function makrkread(Request $request)
    {
        $readedIds = $request->input('readed'); // هذه ستكون مصفوفة تحتوي على IDs
        if ($readedIds) {
            // قم بتحديث الإشعارات لتحديدها كمقروءة
            notf::whereIn('id', $readedIds)->update(['is_read' => true]);
        }
        
        return redirect()->back()->with('success', 'تم تمييز الإشعارات كمقروءة بنجاح.');
    }
    //
    public function NewClient(request $request){
        $TaxRegNum = $request->TaxRegNum3.'-'.$request->TaxRegNum2.'-'.$request->TaxRegNum1;
        $client = new Clients;
        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->activity = $request->activity;
        $client->code = $request->code;
        $client->TaxRegNum = $TaxRegNum;
        $client->mission_id = $request->mission_id;
        $client->save();
        return view('kayan.managing.clients.clients');
    }
    public function Clientshow($id){
        $client = Clients::find($id);
        return view('kayan.managing.clients.Cprofile',compact('client'));
    }
    public function delClient($id){
        $client = Clients::find($id);
        $client->delete();
        return redirect('/ShowClients')->with('success', 'تم حذف العميل بنجاح.');
 
    }

    public function editclient($id, request $request){
        $client = Clients::find($id);
        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->activity = $request->activity;
        $client->code = $request->code;
        $client->TaxRegNum = $request->TaxRegNum;
        $client->mission_id = $request->mission_id;

        $client->save();
        return back()->with('success', 'تم تعديل العميل بنجاح.');
    }
    public function adddocu($id){
        $client = Clients::find($id);
        if(request()->routeIs('addCheckdoc')){  // افترض أن اسم المسار هو addCheckdoc
            return view('kayan.managing.clients.addCheckDoc', compact('client'));
        }elseif(request()->routeIs('addTaxDoc')){
            return view('kayan.managing.clients.addTaxDoc', compact('client'));
        }
        elseif(request()->routeIs('addActivity')){
            return view('kayan.managing.clients.addActivity', compact('client'));
        }
        elseif(request()->routeIs('AddMonDoc')){
            return view('kayan.managing.clients.AddMonDoc', compact('client'));

        }
        elseif((request()->routeIs('addIncomeTaxDoc'))){
            return view('kayan.managing.clients.addInTaxDoc', compact('client'));

        }
        elseif((request()->routeIs('addCAIPtaxDocs'))){
            return view('kayan.managing.clients.AddCIAPtaxDoc', compact('client'));

        }
        elseif((request()->routeIs('AddCheckPeriod'))){
            return view('kayan.managing.clients.AddCheckPeriod', compact('client'));

        }

        ########################################PERSONAL DOCS
        elseif((request()->routeIs('addTaxCard'))){
            return view('kayan.managing.clients.addTaxCard', compact('client'));

        }
        elseif((request()->routeIs('AddCommercialRegistry'))){
            return view('kayan.managing.clients.addComLog', compact('client'));

        }
        elseif((request()->routeIs('addAddedVal'))){
            return view('kayan.managing.clients.addAddedVal', compact('client'));

        }
        elseif((request()->routeIs('addImportCard'))){
            return view('kayan.managing.clients.addImportCard', compact('client'));

        }
        elseif((request()->routeIs('addExportCard'))){
            return view('kayan.managing.clients.addExportCard', compact('client'));

        }
        elseif((request()->routeIs('AddCu'))){
            return view('kayan.managing.clients.AddCU', compact('client'));

        }
        elseif((request()->routeIs('Addcourse'))){
            return view('kayan.managing.clients.Addcourse', compact('client'));

        }
        elseif((request()->routeIs('Addsession'))){
            return view('kayan.managing.clients.Addsession', compact('client'));

        }

        ##############################################################
        elseif((request()->routeIs('AddCSDoc'))){
            return view('kayan.managing.clients.AddCSDoc', compact('client'));

        }
        elseif((request()->routeIs('AddCOCDoc'))){
            return view('kayan.managing.clients.AddCOCDoc', compact('client'));

        }
        elseif((request()->routeIs('AddCRDoc'))){
            return view('kayan.managing.clients.AddCRDoc', compact('client'));

        }
        elseif((request()->routeIs('AddCUUDoc'))){
            return view('kayan.managing.clients.AddCUUDoc', compact('client'));

        }
        elseif((request()->routeIs('AddTradeDoc'))){
            return view('kayan.managing.clients.AddTradeDoc', compact('client'));

        }
        elseif((request()->routeIs('AddCM'))){
            return view('kayan.managing.clients.AddCM', compact('client'));

        }
        elseif((request()->routeIs('addClientAcc'))){
            return view('kayan.managing.clients.addTaxAcc', compact('client'));

        }

    }

    public function accs($id){
        $accs = ClientAccs::where('client_id', $id)->get(); // يعيد مجموعة
        return view('kayan.managing.clients.TaxAcc', compact('accs'));


    }
    
    public function addacc(Request $request){
        $Acc = new ClientAccs;
        $Acc->client_id = $request->client_id;
        $Acc->acctype = $request->acctype;
        $Acc->email = $request->email;
        $Acc->pass = $request->pass;
        $Acc->save();
        return redirect('/ClientAccs/'. $Acc->client_id )->with('success', 'تم إضافة الحساب بنجاح.');
    }
    public function editacc($id,Request $request){
        $Acc = ClientAccs::find($id);
        $Acc->acctype = $request->acctype;
        $Acc->email = $request->email;
        $Acc->pass = $request->pass;
        $Acc->save();
        return redirect('/ClientAccs/'. $Acc->client_id )->with('success', 'تم تعديل الحساب بنجاح.');
    }
    public function delacc($id){
        $client = ClientAccs::find($id);
        $client->delete();
        return back()->with('success', 'تم حذف الحساب بنجاح.');
 
    }
    public function sendClients(){

        $clients = Clients::all();
        return view('kayan.managing.admins.ClientsMoney',compact('clients'));
   

    
}
}