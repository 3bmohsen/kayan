<?php

namespace App\Livewire;

use App\Models\notf;
use Livewire\Component;
use Livewire\WithPagination;

class AllDataNotification extends Component
{
    use WithPagination;

    public function render()
    {
        $nots= notf::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.all-data-notification',compact('nots'));
    }
}
