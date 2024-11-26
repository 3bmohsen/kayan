<?php

use App\Http\Controllers\ActivitesController;
use App\Http\Controllers\AddedvalController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\CheckdocsController;
use App\Http\Controllers\CheckPeriodsController;
use App\Http\Controllers\Client_moneyController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DataManagerController;
use App\Http\Controllers\DatanotfController;
use App\Http\Controllers\Emp_jobsController;
use App\Http\Controllers\Emp_notfController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\GenralMoneyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobsNotesController;
use App\Http\Controllers\MissionsController;
use App\Http\Controllers\MonthInvController;
use App\Http\Controllers\OtherDocsController;
use App\Http\Controllers\PersonalDocsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\taxDocsController;
use App\Http\Middleware\CheckIfAdmin;
use App\Http\Middleware\CheckIfEMP;
use App\Http\Middleware\CheckIfEmployee;
use App\Models\Check_docs;
use App\Models\JobsNotes;
use App\Models\notf;
use Illuminate\Support\Facades\Route;


Route::view('/','kayan.managing.clients.login');

require __DIR__.'/auth.php';

Auth::routes();

#secretary
Route::middleware([CheckIfEmployee::class])->group(function () {

#clients
Route::get('/AddClient',[MissionsController::class, 'show']);
Route::view('/ShowClients','kayan.managing.clients.clients');
Route::post('/Clients/Add',[ClientsController::class, 'NewClient']);
Route::post('/Missions/Add',[MissionsController::class, 'Insert']);
Route::post('/Missions/Del',[MissionsController::class, 'del']);

Route::get('/ClientProfile/{id}',[ClientsController::class,'Clientshow']);
Route::get('/del/client/{id}',[ClientsController::class,'delClient']);
Route::put('/Client/edit/{id}',[ClientsController::class,'editclient']);

###################################
#ُEmployees
Route::view('/AddEmployee','kayan.managing.employees.addemployee');
Route::view('/ShowEmployees','kayan.managing.employees.employees');
Route::post('/Employees/Add',[EmployeesController::class, 'insert']);
Route::get('/del/employee/{id}',[EmployeesController::class,'delemp']);
Route::put('/employee/edit/{id}',[EmployeesController::class,'editemp']);
Route::get('/employeeProfile/{id}',[EmployeesController::class,'empshow']);

#emp_jobs
Route::get('/ReceivedJobs/{id}',[Emp_jobsController::class,'showjobs']);
Route::get('/addEmpJob/{id}',[Emp_jobsController::class,'showaddjob']);
Route::post('/addEmpJob',[Emp_jobsController::class,'addJob']);
Route::put('/JobEdit',[Emp_jobsController::class,'editJob']);
Route::post('/del/job',[Emp_jobsController::class,'deljob']);
Route::post('/del/jobfile',[Emp_jobsController::class,'deljobfile']);

#move job to another emp
Route::put('/JobMove',[Emp_jobsController::class,'jobmove']);


#jobnotes
Route::post('/AddJobNote',[JobsNotesController::class,'addjobnote']);
Route::get('/del/JobNote/{id}',[JobsNotesController::class,'delnote']);


#accs
Route::get('/ClientAccs/{id}',[ClientsController::class,'accs']);
Route::get('/addClientAcc/{id}',[ClientsController::class,'adddocu'])->name('addClientAcc');
Route::post('/addClientAcc',[ClientsController::class,'addacc']);
Route::get('/del/ClientAcc/{id}',[ClientsController::class,'delacc']);
Route::put('/ClientAcc/edit/{id}',[ClientsController::class,'editacc']);


#Check Docs
Route::get('/CheckDocs/{id}',[CheckdocsController::class , 'docs']);
Route::get('/addCheckdoc/{id}',[ClientsController::class,'adddocu'])->name('addCheckdoc');
Route::post('addCheckDoc',[CheckdocsController::class,'addCheckdoc']);
Route::get('/del/checkdoc/{id}',[CheckdocsController::class,'deldoc']);
Route::put('/Checkdoc/edit/{id}',[CheckdocsController::class,'editDoc']);

#Tax Docs
Route::get('/taxDocs/{id}',[taxDocsController::class,'docs']);
Route::get('/addTaxDoc/{id}',[ClientsController::class,'adddocu'])->name('addTaxDoc');
Route::post('/addTaxDoc',[taxDocsController::class,'addtaxDoc']);
Route::put('/taxDoc/edit/{id}',[taxDocsController::class,'editDoc']);
Route::get('/del/taxdoc/{id}',[taxDocsController::class,'deldoc']);

#Activities Docs
Route::get('/Activities/{id}',[ActivitesController::class , 'docs']);
Route::get('/addActivity/{id}',[ClientsController::class,'adddocu'])->name('addActivity');
Route::post('/addActivity',[ActivitesController::class,'addactivity']);
Route::put('/Activity/edit/{id}',[ActivitesController::class,'editDoc']);
Route::get('/del/Activity/{id}',[ActivitesController::class,'deldoc']);


#monthlyDocs Docs

Route::get('/monthlyDocs/{id}',[AddedvalController::class , 'docs'])->name('monthlyDocs');
Route::get('/AddMonDoc/{id}',[ClientsController::class,'adddocu'])->name('AddMonDoc');
Route::post('/AddMonDoc',[AddedvalController::class,'AddMonDoc']);
Route::put('/mondoc/edit/{id}',[AddedvalController::class,'editDoc']);
Route::get('/del/mondoc/{id}',[AddedvalController::class,'deldoc']);



Route::post('/AddInv',[MonthInvController::class,'store']);
Route::get('/del/inv/{id}',[MonthInvController::class,'deldoc']);


#CheckPeriods
Route::get('/CheckPeriods/{id}',[CheckPeriodsController::class,'docs']);
Route::get('/AddCheckPeriod/{id}',[ClientsController::class,'adddocu'])->name('AddCheckPeriod');
Route::post('/AddCheckPeriod',[CheckPeriodsController::class,'AddCheckPeriod']);
Route::put('/CheckPeriod/edit/{id}',[CheckPeriodsController::class,'editDoc']);
Route::get('/del/CheckPeriod/{id}',[CheckPeriodsController::class,'deldoc']);

#incomeTaxDocs Docs

Route::get('/incomeTaxDocs/{id}',[AddedvalController::class , 'docs'])->name('incomeTaxDocs');
Route::get('/addIncomeTaxDoc/{id}',[ClientsController::class,'adddocu'])->name('addIncomeTaxDoc');
Route::post('/addIncomeTaxDoc',[AddedvalController::class,'addIncomeTaxDoc']);
Route::put('/ITDoc/edit/{id}',[AddedvalController::class,'editDoc']);
Route::get('/del/ITDoc/{id}',[AddedvalController::class,'deldoc']);



#CAIPtaxDocs Docs

Route::get('/CAIPtaxDocs/{id}',[AddedvalController::class , 'docs'])->name('CAIPtaxDocs');
Route::get('/AddCIAPtaxDoc/{id}',[ClientsController::class,'adddocu'])->name('addCAIPtaxDocs');
Route::post('/AddCIAPtaxDoc',[AddedvalController::class,'AddCIAPtaxDoc']);
Route::put('/CIAPtaxDoc/edit/{id}',[AddedvalController::class,'editDoc']);
Route::get('/del/CIAPtaxDoc/{id}',[AddedvalController::class,'deldoc']);


#PERSONALDOCS

Route::get('/TaxCards/{id}',[PersonalDocsController::class , 'docs'])->name('TaxCard');
Route::get('/addTaxCard/{id}',[ClientsController::class,'adddocu'])->name('addTaxCard');
Route::post('/addTaxCard',[PersonalDocsController::class,'AddDoc']);
Route::put('/TaxCard/edit/{id}',[PersonalDocsController::class,'editDoc']);
Route::get('/del/TaxCard/{id}',[PersonalDocsController::class,'deldoc']);


Route::get('/CommercialRegistry/{id}',[PersonalDocsController::class , 'docs'])->name('ComLog');
Route::get('/AddCommercialRegistry/{id}',[ClientsController::class,'adddocu'])->name('AddCommercialRegistry');
Route::post('/AddCommercialRegistry',[PersonalDocsController::class,'AddDoc']);
Route::put('/CommercialRegistry/edit/{id}',[PersonalDocsController::class,'editDoc']);
Route::get('/del/CommercialRegistry/{id}',[PersonalDocsController::class,'deldoc']);



Route::get('/AddedVal/{id}',[PersonalDocsController::class , 'docs'])->name('AddedVal');
Route::get('/addAddedVal/{id}',[ClientsController::class,'adddocu'])->name('addAddedVal');
Route::post('/addAddedVal',[PersonalDocsController::class,'AddDoc']);
Route::put('/AddedVal/edit/{id}',[PersonalDocsController::class,'editDoc']);
Route::get('/del/AddedVal/{id}',[PersonalDocsController::class,'deldoc']);



Route::get('/ImportCard/{id}',[PersonalDocsController::class , 'docs'])->name('ImportCard');
Route::get('/addImportCard/{id}',[ClientsController::class,'adddocu'])->name('addImportCard');
Route::post('/addImportCard',[PersonalDocsController::class,'AddDoc']);
Route::put('/ImportCard/edit/{id}',[PersonalDocsController::class,'editDoc']);
Route::get('/del/ImportCard/{id}',[PersonalDocsController::class,'deldoc']);



Route::get('/ExportCard/{id}',[PersonalDocsController::class , 'docs'])->name('ExportCard');
Route::get('/addExportCard/{id}',[ClientsController::class,'adddocu'])->name('addExportCard');
Route::post('/addExportCard',[PersonalDocsController::class,'AddDoc']);
Route::put('/ExportCard/edit/{id}',[PersonalDocsController::class,'editDoc']);
Route::get('/del/ExportCard/{id}',[PersonalDocsController::class,'deldoc']);



Route::get('/ContractorsUnion/{id}',[PersonalDocsController::class , 'docs'])->name('CU');
Route::get('/AddCu/{id}',[ClientsController::class,'adddocu'])->name('AddCu');;
Route::post('/AddCu',[PersonalDocsController::class,'AddDoc']);
Route::put('/ContractorsUnion/edit/{id}',[PersonalDocsController::class,'editDoc']);
Route::get('/del/ContractorsUnion/{id}',[PersonalDocsController::class,'deldoc']);





Route::get('/Courses/{id}',[PersonalDocsController::class , 'docs'])->name('courses');
Route::get('/Addcourse/{id}',[ClientsController::class,'adddocu'])->name('Addcourse');;
Route::post('/AddCourse',[PersonalDocsController::class,'AddDoc']);
Route::put('/Course/edit/{id}',[PersonalDocsController::class,'editDoc']);
Route::get('/del/Course/{id}',[PersonalDocsController::class,'deldoc']);


Route::get('/Sessions/{id}',[PersonalDocsController::class , 'docs'])->name('Sessions');
Route::get('/Addsession/{id}',[ClientsController::class,'adddocu'])->name('Addsession');;
Route::post('/Addsession',[PersonalDocsController::class,'AddDoc']);
Route::put('/Session/edit/{id}',[PersonalDocsController::class,'editDoc']);
Route::get('/del/Session/{id}',[PersonalDocsController::class,'deldoc']);



##########################################################################


Route::get('/CensorshipDocs/{id}',[OtherDocsController::class , 'docs'])->name('CensorshipDocs');
Route::get('/AddCSDoc/{id}',[ClientsController::class,'adddocu'])->name('AddCSDoc');;
Route::post('/AddCSDoc',[OtherDocsController::class,'AddDoc']);
Route::put('/CensorshipDocs/edit/{id}',[OtherDocsController::class,'editDoc']);
Route::get('/del/CensorshipDocs/{id}',[OtherDocsController::class,'deldoc']);

Route::get('/COCDocs/{id}',[OtherDocsController::class , 'docs'])->name('COCDocs');
Route::get('/AddCOCDoc/{id}',[ClientsController::class,'adddocu'])->name('AddCOCDoc');;
Route::post('/AddCOCDoc',[OtherDocsController::class,'AddDoc']);
Route::put('/COCDocs/edit/{id}',[OtherDocsController::class,'editDoc']);
Route::get('/del/COCDocs/{id}',[OtherDocsController::class,'deldoc']);

Route::get('/CRDocs/{id}',[OtherDocsController::class , 'docs'])->name('CRDocs');
Route::get('/AddCRDoc/{id}',[ClientsController::class,'adddocu'])->name('AddCRDoc');;
Route::post('/AddCRDoc',[OtherDocsController::class,'AddDoc']);
Route::put('/CRDocs/edit/{id}',[OtherDocsController::class,'editDoc']);
Route::get('/del/CRDocs/{id}',[OtherDocsController::class,'deldoc']);



Route::get('/CUUDocs/{id}',[OtherDocsController::class , 'docs'])->name('CU2');
Route::get('/AddCUUDoc/{id}',[ClientsController::class,'adddocu'])->name('AddCUUDoc');;
Route::post('/AddCUUDoc',[OtherDocsController::class,'AddDoc']);
Route::put('/CUUDocs/edit/{id}',[OtherDocsController::class,'editDoc']);
Route::get('/del/CUUDocs/{id}',[OtherDocsController::class,'deldoc']);



Route::get('/tradeDocs/{id}',[OtherDocsController::class , 'docs'])->name('tradeDocs');
Route::get('/AddTradeDoc/{id}',[ClientsController::class,'adddocu'])->name('AddTradeDoc');;
Route::post('/AddTradeDoc',[OtherDocsController::class,'AddDoc']);
Route::put('/tradeDocs/edit/{id}',[OtherDocsController::class,'editDoc']);
Route::get('/del/tradeDocs/{id}',[OtherDocsController::class,'deldoc']);


#BACKEND
Route::post('/Clients/Add',[ClientsController::class, 'NewClient']);
Route::get('/ClientProfile/{id}',[ClientsController::class,'Clientshow']);
Route::get('/del/client/{id}',[ClientsController::class,'delClient']);
Route::put('/Client/edit/{id}',[ClientsController::class,'editclient']);
Route::put('/markreaded',[ClientsController::class,'makrkread']);





});

Route::get('/notifications', function () {
    $notifications = \DB::table('notifications')->orderBy('created_at', 'desc')->get();
    return response()->json($notifications);
});


##############################DATA MANAGER LOGIN#############################
Route::view('/DataManager/login','kayan.managing.clients.login');
Route::post('/DataManager/login', [DataManagerController::class, 'login']);
Route::get('/DataManager/logout', [DataManagerController::class, 'logout']);







#########################################################################################




Route::view('/Employee/Login','kayan.managing.employees.empfront.login');
Route::post('/EMP/login',[EmployeesController::class,'login']);
Route::get('/Employee/Logout',[EmployeesController::class,'logout']);
Route::middleware([CheckIfEMP::class])->group(function () {
Route::put('/EMPmarkreaded',[EmployeesController::class,'makrkread']);
Route::get('/MyJobs/{id}',[Emp_jobsController::class,'showjobs4emp']);
Route::get('/MyJobs',function (){
    return redirect('/MyJobs/' . Auth::guard('employees')->id());
});
Route::get('/JobDetails/{id}',[Emp_jobsController::class,'showjobsDetails4emp']);
Route::get('/JobDetails',function (){
    return redirect('/MyJobs/' . Auth::guard('employees')->id());
});
});


############################################################################################

Route::view('/Admins/Login','kayan.managing.admins.login');
Route::post('/Admin/login',[AdminsController::class,'login']);
Route::get('/Admin/Logout',[AdminsController::class,'logout']);


Route::middleware([CheckIfAdmin::class])->group(function () {
Route::view('/Admins/dashboard','kayan.managing.admins.dash');
Route::view('/Admins/ClientsShow','kayan.managing.admins.clients');
Route::view('/Admin/Addclient','kayan.managing.admins.addclient');
Route::view('/Admins','kayan.managing.admins.admins');
Route::view('/DataManagers','kayan.managing.admins.DataManagers');
Route::post('/addDataManager',[DataManagerController::class,'newD']);
Route::put('/DataManager/edit/{id}',[DataManagerController::class,'editD']);
Route::get('/del/DataManager/{id}',[DataManagerController::class,'delD']);
Route::post('/addAdmin',[AdminsController::class,'newAdmin']);
Route::put('/admin/edit/{id}',[AdminsController::class,'editAdmin']);
Route::get('/del/admin/{id}',[AdminsController::class,'delAdmin']);

Route::view('/Admins/ShowJobs','kayan.managing.admins.Jobs');
Route::view('/Admins/allEmpnotf','kayan.managing.admins.allEmpnotf');
Route::get('/SendEmpNotf',[Emp_notfController::class,'sendEmps']);
Route::post('/SendEmpNotf',[Emp_notfController::class,'newnot']);
Route::put('/not/edit/{id}',[Emp_notfController::class,'editnot']);
Route::get('/del/not/{id}',[Emp_notfController::class,'delnot']);
Route::view('/Admins/allDatanotf','kayan.managing.admins.allDatanotf');
Route::post('/NewDataNotf',[DatanotfController::class,'New_Notfication']);
Route::put('/Datanot/edit/{id}',[DatanotfController::class,'editnot']);
Route::get('/del/Datanot/{id}',[DatanotfController::class,'delnot']);


#

Route::get('/ClientMoney/{id}',[Client_moneyController::class , 'Accounts'])->name('ClientMoney');
Route::get('/AddCM/{id}',[ClientsController::class,'adddocu'])->name('AddCM');;
Route::post('/AddCM',[Client_moneyController::class,'AddAcc']);
Route::put('/ClientMoney/edit/{id}',[Client_moneyController::class,'editAcc']);
Route::get('/del/ClientMoney/{id}',[Client_moneyController::class,'delAcc']);
Route::get('/ClientsMoney',[ClientsController::class,'sendClients']);

Route::post('/AddGM',[GenralMoneyController::class,'insert']);
Route::view('/Admins/GenralMoney','kayan.managing.admins.Gmoney');
Route::get('/del/gmoney/{id}',[GenralMoneyController::class,'delete']);
Route::put('/gmoney/edit/{id}',[GenralMoneyController::class,'edit']);

});