<?php

namespace App\Livewire;
use App\Models\notf;
use Livewire\Component;

class Notreaded extends Component
{
    public function render()
    {
        $this->notff = notf::where('is_read', 'false')->count();
        return view('livewire.notreaded',['notff'=>$this->notff]);
    }
}
