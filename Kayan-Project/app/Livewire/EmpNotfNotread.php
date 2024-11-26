<?php

namespace App\Livewire;

use App\Models\Emp_notf;
use Livewire\Component;

class EmpNotfNotread extends Component
{
    public $emp_id='';
    public function mount($id)
    {
        $this->emp_id = $id;
    }
    public function render()
    {
        $this->notff = Emp_notf::where(function($query) {
            $query->where('emp_id', $this->emp_id)
                  ->orWhere('moved_emp_id', $this->emp_id);
         })
        ->where('is_read', 'false')->count();
        return view('livewire.emp-notf-notread',['notff'=>$this->notff]);
    }
}
