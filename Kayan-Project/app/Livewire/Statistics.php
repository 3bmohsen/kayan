<?php

namespace App\Livewire;

use App\Models\Activites;
use App\Models\Addedval;
use App\Models\Admins;
use App\Models\Check_docs;
use App\Models\CheckPeriods;
use App\Models\Client_money;
use App\Models\Clients;
use App\Models\Data_manager;
use App\Models\Emp_jobs;
use App\Models\Emp_notf;
use App\Models\Employees;
use App\Models\G_Money;
use App\Models\MonInv;
use App\Models\notf;
use App\Models\OtherDocs;
use App\Models\PersonalDocs;
use App\Models\taxDocs;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Statistics extends Component
{
    public $folderPath; // المسار المطلوب
    public $sizee;
    public $size; // متغير لتخزين المساحة
    public function calculateFolderSize()
    {
        $this->size = $this->getFolderSize($this->folderPath);
    }
    public function getFolderSize($path)
    {
        $size = 0;
        
        // جلب جميع الملفات داخل المجلد والحسابات الفرعية
        foreach (File::allFiles($path) as $file) {
            $size += $file->getSize();
        }

        $this->sizee = $size;

        // تحويل الحجم إلى صيغة مناسبة

        return $this->formatSizeUnits($size);
    }
    
    public function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
    public function formatSizeUnitss($bytess)
    {
        return number_format($bytess / 1073741824, 2);
    }
    public function render()
    {
        $this->folderPath = public_path('storage/docs');
        $this->calculateFolderSize();

    

    
    
    
        $sizeee = $this->formatSizeUnitss( $this->sizee);
        $this->clients = Clients::count();
        $this->emps= Employees::count();
        $this->admins = Admins::count();
        $this->data = Data_manager::count();
        $this->jobs = Emp_jobs::count();

        $this->addedval = Addedval::count();
        $this->act = Activites::count();
        $this->checd = Check_docs::count();
        $this->checp = CheckPeriods::count();
        $this->moninv = MonInv::count();
        $this->otherd = OtherDocs::count();
        $this->perd = PersonalDocs::count();
        $this->tax = taxDocs::count();

        $this->files = $this->addedval + $this->act + $this->checd + $this->checp + $this->moninv + $this->otherd + $this->perd + $this->tax;

        $this->notfs = notf::count() + Emp_notf::count();

        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $monthlyEarnings = G_Money::whereMonth('date', $currentMonth)
                                    ->whereYear('date', $currentYear)
                                    ->sum('money');
function formatNumber($number)
{
    $sign = $number < 0 ? '-' : ''; // تحديد الإشارة
    $number = abs($number); // تحويل الرقم إلى القيمة المطلقة

    if ($number >= 1000000) {
        return $sign . round($number / 1000000, 2) . 'M'; // صيغة الملايين
    } elseif ($number >= 1000) {
        return $sign . round($number / 1000, 2) . 'K'; // صيغة الألوف
    }

    return $sign . $number; // إذا كان أقل من 1000
}
    $profit= formatNumber($monthlyEarnings);
        return view('livewire.statistics',['clients'=>$this->clients, 'emps'=>$this->emps,'admins'=>$this->admins,'jobs'=>$this->jobs,'files'=>$this->files,'notfs'=>$this->notfs,'data'=>$this->data,'profit'=>$profit],compact('sizeee'));
    }
}
