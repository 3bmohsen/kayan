<?php

namespace App\Livewire;

use App\Models\Data_manager;
use Livewire\Component;
use Livewire\WithPagination;
class DataManagers extends Component
{use WithPagination;
    public function render()
    {
        $this->s = Data_manager::orderBy('created_at', 'desc')
        ->paginate(10);
        return view('livewire.data-managers',['s'=>$this->s]);
    }
}
