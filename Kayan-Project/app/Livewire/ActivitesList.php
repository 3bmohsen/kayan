<?php

namespace App\Livewire;

use App\Models\Activites;
use Livewire\Component;
use Livewire\WithPagination;


class ActivitesList extends Component
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
        
        $this->Docs = Activites::where(function ($query) {
            if ($this->fileName) {
                $query->orWhere('file_name', 'like', '%' . $this->fileName . '%');
            }
        })->where('client_id',$this->client_id)
        ->orderBy('created_at', 'desc')
        ->paginate(5);
        return view('livewire.activites-list',['docs'=>$this->Docs]);
    }
}
