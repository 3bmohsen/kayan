<?php

namespace App\Livewire;

use App\Models\Check_docs;
use Livewire\Component;
use Livewire\WithPagination;
class CheckDocs extends Component
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
        
        $this->Docs = Check_docs::where(function ($query) {
            if ($this->fileName) {
                $query->orWhere('file_name', 'like', '%' . $this->fileName . '%');
            }
        })->where('client_id',$this->client_id)
        ->orderBy('created_at', 'desc')
        ->paginate(5);
        return view('livewire.check-docs',['docs'=>$this->Docs]);
    }
}
