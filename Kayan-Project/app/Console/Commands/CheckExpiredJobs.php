<?php

namespace App\Console\Commands;

use App\Mail\employee_alert;
use App\Models\Emp_jobs;
use App\Models\Emp_notf;
use App\Models\Employees;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Mail;

class CheckExpiredJobs extends Command
{
    protected $signature = 'jobs:check-expired';
    protected $description = 'Check if jobs in empjobs table have expired and update their status to expired';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $remainig = Carbon::today()->setTimezone('Africa/Cairo')->addDays(1)->toDateString();

        $remainigJobs = Emp_jobs::where('status', '=', 'waiting')
        ->where('exp', '=', $remainig)->get();
        foreach ($remainigJobs as $job) {
            // تحديث حالة الوظيفة إلى "expired"
            // إضافة إشعار إلى جدول الإشعارات
            $message = '<span style="color: red;">الوظيفة الخاصة بالعميل ' . $job->client->name . ' متبقي على انتهائها يوم واحد' . '<a href="/JobDetails/' . $job->id . '">إطلع عليها</a>' . '.</span>';

            Emp_notf::create([
                'emp_id' => $job->employee_id,
                'message' => $message,
                'is_read' => 'false',
            ]);
            
            $emp = Employees::find($job->employee_id);
            Mail::to($emp->email)->send(new employee_alert($message));
       
        }

        $currentDate = Carbon::today()->setTimezone('Africa/Cairo')->toDateString();

        // جلب الوظائف التي انتهت صلاحيتها في جدول empjobs وتحديث حالتها
        $expiredJobs = Emp_jobs::where('status', '=', 'waiting')
            ->where('exp', '<', $currentDate)->get();
            foreach ($expiredJobs as $job) {
                // تحديث حالة الوظيفة إلى "expired"
                $job->update(['status' => 'expired']);
    
                // إضافة إشعار إلى جدول الإشعارات
                $message = '<span style="color: red;">انتهت صلاحية الوظيفة الخاصة بالعميل ' . $job->client->name . ' ' . '<a href="/JobDetails/' . $job->id . '">إطلع عليها</a>' . '.</span>';

                Emp_notf::create([
                    'emp_id' => $job->employee_id,
                    'message' => $message,
                    'is_read' => 'false',
                ]);
                
                $emp = Employees::find($job->employee_id);
                Mail::to($emp->email)->send(new employee_alert($message));
            }

            $this->info("Expired jobs and notifications updated successfully.");
    }
}