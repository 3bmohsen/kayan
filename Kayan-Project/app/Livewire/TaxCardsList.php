<?php

namespace App\Livewire;

use App\Models\PersonalDocs;
use Livewire\Component;
use Livewire\WithPagination;

class TaxCardsList extends Component
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
        
        $this->Docs = PersonalDocs::where(function ($query) {
            if ($this->fileName) {
                $query->orWhere('file_name', 'like', '%' . $this->fileName . '%');
            }
        })->where('client_id',$this->client_id)
        ->where('filetype','1')
        ->orderBy('created_at', 'desc')
        ->paginate(5);
        return view('livewire.tax-cards-list',['docs'=>$this->Docs]);
    }
}
