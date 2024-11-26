<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Admins extends Component
{
    use WithPagination;
    public function render()
    {
        // استعلام مع دعم البحث عن الكود أو رقم الهاتف أو الاسم
        $this->admins = \App\Models\Admins::orderBy('created_at', 'desc')
            ->paginate(10);
        return view('livewire.admins',['admins'=>$this->admins]);
    }
}
