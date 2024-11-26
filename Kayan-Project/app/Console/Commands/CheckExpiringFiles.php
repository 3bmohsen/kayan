<?php

namespace App\Console\Commands;
use App\Events\sound;
use App\Models\Admins;
use App\Models\Clients;
use App\Models\Data_manager;
use Illuminate\Support\Facades\Log;

use App\Models\PersonalDocs;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Events\NotificationSent;
use App\Mail\ExpiringFileNotification;
use Illuminate\Support\Facades\Mail;

class CheckExpiringFiles extends Command
{
    public $message = '';

    protected $signature = 'files:check-expiration';
    protected $description = 'Check for files expiring within 15 days and log notifications.';

    public function handle()
    {
        Log::info('Starting check for files expiring within 15 days.');

        $date15 = Carbon::today()->setTimezone('Africa/Cairo')->addDays(15)->toDateString();  // تاريخ بعد 15 يوم
        $date30 = Carbon::today()->setTimezone('Africa/Cairo')->addDays(30)->toDateString();  // تاريخ بعد 30 يوم

        Log::info('Checking files expiring on: 15 days -> ' . $date15 . ', 30 days -> ' . $date30);
        
        $expiringFiles = PersonalDocs::where('expDate', '=', $date15)
            ->orWhere('expDate', '=', $date30)
            ->get();

        
        foreach ($expiringFiles as $file) {
            $daysRemaining = floor(Carbon::today()->setTimezone('Africa/Cairo')->diffInDays(Carbon::parse($file->expDate)));

            // جلب العميل المرتبط بالملف باستخدام client_id
            $client = Clients::where('id', '=', $file->client_id)->first();
        
            // تحقق مما إذا كان العميل موجودًا
            if ($client) {
                // Determine the message dynamically based on the file type
                if ($file->filetype == '7') {
                    $this->message = 'الدورة '.$file->notes.' الخاصة بالعميل '.$client->name.' باقي على تاريخها '.$daysRemaining. 'يوم.';
                } elseif ($file->filetype == '8') {
                    $this->message = 'الجلسة '.$file->notes.' الخاصة بالعميل '.$client->name.' باقي على تاريخها '.$daysRemaining. 'يوم.';
                } else {
                    $this->message = 'الملف '.$file->file_name.' الخاص بالعميل '.$client->name.' سينتهي بعد '.$daysRemaining. 'يوم.';
                }
            
                // Insert the notification into the database
                \DB::table('notifications')->insert([
                    'file_id' => $file->id,
                    'client_id' => $file->client_id,
                    'message' => $this->message,
                    'is_read' => 'false',
                    'created_at' => now()->setTimezone('Africa/Cairo'),
                    'updated_at' => now()->setTimezone('Africa/Cairo'),
                ]);
            }
            
                // في دالة handle() الخاصة بك
                log::info('Notification sent: ' . $this->message);
                
                $daysRemaining = floor(Carbon::today()->diffInDays(Carbon::parse($file->expDate)));
                $emails = Data_manager::pluck('email')->toArray();
                $adminsEmails=Admins::pluck('email')->toArray();
                $message= (string) $this->message;
                Mail::to($emails)->send(new ExpiringFileNotification($message));
                Mail::to($adminsEmails)->send(new ExpiringFileNotification($message));




        }

        Log::info('File expiration check completed.');

    }
}
