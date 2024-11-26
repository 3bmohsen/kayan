<?php

namespace App\Livewire;

use App\Models\Addedval;
use Livewire\Component;
use Livewire\WithPagination;

class CIAPtaxDocsList extends Component
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
        
        $this->Docs = Addedval::where(function ($query) {
            if ($this->fileName) {
                $query->orWhere('file_name', 'like', '%' . $this->fileName . '%');
            }
        })->where('client_id',$this->client_id)
        ->where('filetype','3')
        ->orderBy('created_at', 'desc')
        ->paginate(5);
        return view('livewire.c-i-a-ptax-docs-list',['docs'=>$this->Docs]);
    }
}
