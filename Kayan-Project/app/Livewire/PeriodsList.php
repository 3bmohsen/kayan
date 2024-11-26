<?php

namespace App\Livewire;

use App\Models\CheckPeriods;
use Livewire\WithPagination;
use Livewire\Component;

class PeriodsList extends Component
{
    use WithPagination;
    public $fileName='';
    public $client_id='';
    public function mount($id)
    {
        $this->client_id = $id;
    }
    public function render()
    {
        
        $this->Docs = CheckPeriods::where(function ($query) {
            if ($this->fileName) {
                $query->orWhere('file_name', 'like', '%' . $this->fileName . '%');
            }
        })->where('client_id',$this->client_id)
        ->orderBy('created_at', 'desc')
        ->paginate(5);
        return view('livewire.periods-list',['docs'=>$this->Docs]);
    }
}
