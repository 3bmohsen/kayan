<?php

namespace App\Http\Controllers;

use App\Mail\employee_alert;
use App\Models\Clients;
use App\Models\Emp_jobs;
use App\Models\Emp_notf;
use App\Models\Employees;
use App\Models\JobsNotes;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use Storage;

class Emp_jobsController extends Controller
{

    public function showjobs4emp($id){
        if($id != Auth::guard('employees')->id()){
            return redirect('/MyJobs/'.Auth::guard('employees')->id())->with('fail','صفحة الوظائف هذه ليست خاصة بك.');
        }elseif($id == Auth::guard('employees')->id() || Auth::guard('admins')->check()){
            $jobs = Emp_jobs::where('employee_id', $id);
            return view('kayan.managing.employees.empFront.jobs',compact('jobs'));
        }

    }
    public function showjobsDetails4emp($id){
        $job = Emp_jobs::find($id);

        if($job && Auth::guard('admins')->check()){
            return view('kayan.managing.employees.empFront.jobDetails',compact('job'));

        }elseif(!$job || $job->employee_id != Auth::guard('employees')->id()){
            return redirect('/MyJobs/'.Auth::guard('employees')->id())->with('fail','هذه الوظيفة ليست خاصة بك.');
        }elseif($job && $job->employee_id == Auth::guard('employees')->id()){
            return view('kayan.managing.employees.empFront.jobDetails',compact('job'));
        }

    }







    public function showjobs($id){
        $empJobs = Emp_jobs::with('client')
        ->where('employee_id', $id)
        ->orderBy('updated_at', 'desc')
        ->paginate(5);  
        $clients = Clients::all();  
        $emp = Employees::find($id);
        $notes = JobsNotes::orderBy('updated_at', 'desc')
        ->paginate(5);
        $emps = Employees::all();
        return view('kayan.managing.employees.rec_job', compact('empJobs','clients','emp','notes','emps'));

    }
    public function showaddjob(){
        $clients = Clients::all();
        return view('kayan.managing.employees.addJob',compact('clients'));
    }
    public function addJob(Request $request){
        $job = new Emp_jobs;
        $job->client_id = $request->client_id;
        $job->employee_id = $request->employee_id;
        $job->job_details = $request->job_details;
        $job->exp = $request->exp;
        $job->status = 'waiting';
        if ($request->hasFile('doc_file')) {
            $job->file_path = $request->file('doc_file')->store('docs', 'public');  // تخزين مسار الملف في قاعدة البيانات
            $job->file_name = $request->file('doc_file')->getClientOriginalName();   // تخزين اسم الملف
        } else {
            $job->file_path = null;  // تعيين الحقل كـ null إذا لم يتم رفع ملف
            $job->file_name = null;  // تعيين اسم الملف كـ null إذا لم يتم رفع ملف
        }
        $job->save();
        
        $client = Clients::find($job->client_id);
        $notf = new Emp_notf;
        $notf->emp_id = $job->employee_id;
        $notf->message = 'تم إضافة وظيفة جديدة لك خاصة بالعميل '.$client->name.' في مأمورية '.$client->Missions->mission_name.' واخر ميعاد لانهاء الوظيفة هو '.$job->exp . ' ' . '<a href="/JobDetails/' . $job->id . '">إطلع عليها</a>' . '.</span>';
        $notf->is_read = 'false';
        $notf->save();
        $emp = Employees::find($notf->emp_id);
        Mail::to($emp->email)->send(new employee_alert($notf->message));

        return redirect('/ReceivedJobs/'. $job->employee_id)->with('success','تم اضافة الوظيفة بنجاح.');

    }
    public function editJob(Request $request){
        if (Hash::check($request->password, Auth::guard('data_manager')->user()->password)) {
            $job = Emp_jobs::find($request->jobid);
            $job->client_id = $request->client_id;
            $job->job_details = $request->job_details;
            $job->exp = $request->exp;
            $job->status = $request->status;
            if ($request->hasFile('doc_file')) {
                if($job->file_path != null){
                    Storage::disk('public')->delete($job->file_path);
                }
                $job->file_path = $request->file('doc_file')->store('docs', 'public');  // تخزين مسار الملف في قاعدة البيانات
                $job->file_name = $request->file('doc_file')->getClientOriginalName();   // تخزين اسم الملف
            }
            
            $job->save();
            return redirect('/ReceivedJobs/'. $job->employee_id)->with('success','تم تعديل الوظيفة بنجاح.');
    
        }else{
            return redirect()->back()->with('fail', 'الباسورد المدخل غير صحيح');

        }

    }
    public function jobmove(Request $request){
        if (Hash::check($request->password, Auth::guard('data_manager')->user()->password)) {

        $job = Emp_jobs::find($request->jobid);
        $old_emp = Employees::find($job->employee_id);
        $client = $job->client->name;
        $new_emp= Employees::find($request->emp_id);
        $job->employee_id = $request->emp_id;
        $job->exp = $request->exp;
        $job->status = $request->status;
        $job->save();

        $notf = new Emp_notf;
        $notf->emp_id = $old_emp->id;
        $notf->moved_emp_id = $request->emp_id;
        $notf->message = 'تم نقل المهمة الخاصة بالعميل '.$client.' من الموظف '.$old_emp->name.' إلى الموظف '.$new_emp->name.' واخر ميعاد لإنهائها هو '.$job->exp . ' ' . '<a href="/JobDetails/' . $job->id . '">إطلع عليها</a>' . '.</span>';
        $notf->is_read = 'false';
        $notf->save();
        
        Mail::to($old_emp->email)->send(new employee_alert($notf->message));
        Mail::to($new_emp->email)->send(new employee_alert($notf->message));

        return redirect()->back()->with('success', 'تم نقل الوظيفة الى الموظف ' . '<a href="/ReceivedJobs/' . $new_emp->id . '">' . $new_emp->name . '</a>' . ' بنجاح');
    }
        else{
            return redirect()->back()->with('fail', 'الباسورد المدخل غير صحيح');

        }
    }
    public function deljob(Request $request){
        if (Hash::check($request->password, Auth::guard('data_manager')->user()->password)) {
            $job = Emp_jobs::find($request->jobid);
            if($job->file_path != null){
                Storage::disk('public')->delete($job->file_path);
            }
        $job->delete();
        return redirect('/ReceivedJobs/'. $job->employee_id)->with('success','تم حذف الوظيفة بنجاح.');
        }else{
            return redirect()->back()->with('fail', 'الباسورد المدخل غير صحيح');

        }
    }
    public function deljobfile(Request $request){
        if (Hash::check($request->password, Auth::guard('data_manager')->user()->password)) {
            $job = Emp_jobs::find($request->jobid);
            if($job->file_path != null){
                Storage::disk('public')->delete($job->file_path);
                $job->file_path = null;  // تعيين الحقل كـ null إذا لم يتم رفع ملف
                $job->file_name = null;
                $job->save();
            }
        return redirect('/ReceivedJobs/'. $job->employee_id)->with('success','تم حذف ملف الوظيفة بنجاح.');
        }else{
            return redirect()->back()->with('fail', 'الباسورد المدخل غير صحيح');

        }
    }
}
