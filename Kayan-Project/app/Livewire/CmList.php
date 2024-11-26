<?php

namespace App\Livewire;

use App\Models\Client_money;
use Livewire\Component;
use Livewire\WithPagination;

class CmList extends Component
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
        
        $this->Docs = Client_money::where(function ($query) {
            if ($this->fileName) {
                $query->orWhere('notes', 'like', '%' . $this->fileName . '%');
            }
        })->where('client_id',$this->client_id)
        ->orderBy('created_at', 'desc')
        ->paginate(5);
        return view('livewire.cm-list',['docs'=>$this->Docs]);
    }

}
