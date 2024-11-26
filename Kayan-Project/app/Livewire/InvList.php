<?php

namespace App\Livewire;

use App\Models\MonInv;
use Livewire\Component;

class InvList extends Component
{
    public $client_id='';
    public function mount($id)
    {
        $this->client_id = $id;
    }
    public function render()
    {
        
        $this->Buys = MonInv::where('client_id',$this->client_id)
        ->where('type','purchase')
        ->orderBy('created_at', 'desc');
        return view('livewire.inv-list',['Buys'=>$this->Buys]);
    }
}
