<?php

namespace App\Livewire;

use App\Models\G_Money;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
class GMoney extends Component
{
    use WithPagination;

    public $date = '';
    public $month = ''; 
    public function render()
    {
        $gmm = G_Money::where(function ($query) {
            if ($this->date) {
                $query->where('date', $this->date);
            } 
            if ($this->month) {
                // تقسيم الشهر والسنة من القيمة المرسلة
                [$year, $month] = explode('-', $this->month);
                $query->whereYear('date', $year)
                      ->whereMonth('date', $month);
            }
        })
        ->orderBy('created_at', 'desc')->paginate(10);
        
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $monthlyEarnings = G_Money::whereMonth('date', $currentMonth)
                                    ->whereYear('date', $currentYear)
                                    ->sum('money');
        return view('livewire.g-money', compact('gmm','monthlyEarnings'));
    }
}
