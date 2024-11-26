<?php

namespace App\Http\Controllers;

use App\Mail\employee_alert;
use App\Models\Emp_jobs;
use App\Models\Emp_notf;
use App\Models\Employees;
use App\Models\JobsNotes;
use Illuminate\Http\Request;
use Mail;

class JobsNotesController extends Controller
{
    public function addjobnote(Request $request){
        $jobNote = new JobsNotes;
        $jobNote->job_id = $request->job_id;
        $jobNote->note = $request->JobNote;
        $jobNote->save();

        $job= Emp_jobs::find($jobNote->job_id);
        $emp = Employees::find($job->employee->id);
        $notf = new Emp_notf;
        $notf->emp_id = $emp->id;
        $notf->message = 'تم إضافة ملاحظة الى الوظيفة الخاصة بالعميل '.$job->client->name.' '. '<a href="/JobDetails/' . $job->id . '">إطلع عليها</a>'.'.';
        $notf->is_read = 'false';
        $notf->save();
        Mail::to($emp->email)->send(new employee_alert($notf->message));
        return redirect()->back()->with('success','تم اضافة الملاحظة بنجاح.');

    }
    public function delnote($id){
        $job = JobsNotes::find($id);
        $job->delete();
        return redirect()->back()->with('success','تم حذف الملاحظة بنجاح.');

    }
}
