<?php

namespace App\Livewire;

use App\Models\Employees;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeesList extends Component
{
    use WithPagination;


    public $phone = ''; // خاصية البحث عن الهاتف
    public $name = ''; // خاصية البحث عن الاسم

    public function render()
    {
        // استعلام مع دعم البحث عن الكود أو رقم الهاتف أو الاسم
        $this->employees = Employees::where(function ($query) {

                if ($this->phone) {
                    $query->orWhere('phone', 'like', '%' . $this->phone . '%');
                }

                if ($this->name) {
                    $query->orWhere('name', 'like', '%' . $this->name . '%');
                }
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.employees-list',['employees'=>$this->employees]);
    }
}
