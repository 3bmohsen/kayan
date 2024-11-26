<?php

namespace App\Livewire;

use App\Models\notf;
use Livewire\Component;
use Livewire\WithPagination;

class Notifications extends Component
{
    use WithPagination;

    public function render()
    {
        
        
        $this->notf = notf::orderBy('created_at', 'desc')->get();
        return view('livewire.notifications',['notf'=>$this->notf]);
    }
}
