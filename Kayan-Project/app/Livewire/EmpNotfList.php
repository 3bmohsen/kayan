<?php

namespace App\Livewire;

use App\Models\Emp_notf;
use Livewire\Component;

class EmpNotfList extends Component
{

    public $emp_id='';
    public function mount($id)
    {
        $this->emp_id = $id;
    }

    public function render()
    {
        $this->notf = Emp_notf::where('emp_id', $this->emp_id)
        ->orWhere(function($query) {
            $query->where('moved_emp_id', $this->emp_id);
        })
         
        ->orderBy('created_at', 'desc')->get();
        return view('livewire.emp-notf-list',['notf'=>$this->notf]);
    }
}
