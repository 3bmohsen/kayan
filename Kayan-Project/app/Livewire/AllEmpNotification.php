<?php

namespace App\Livewire;

use App\Models\Emp_notf;
use Livewire\Component;
use Livewire\WithPagination;

class AllEmpNotification extends Component
{
    use WithPagination;

    public function render()
    {
        $nots= Emp_notf::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.all-emp-notification',compact('nots'));
    }
}
