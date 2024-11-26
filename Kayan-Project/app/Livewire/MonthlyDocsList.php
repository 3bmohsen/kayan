<?php

namespace App\Livewire;

use App\Models\Addedval;
use App\Models\MonInv;
use Livewire\Component;
use Livewire\WithPagination;


class MonthlyDocsList extends Component
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
        ->where('filetype','1')
        ->orderBy('created_at', 'desc')
        ->paginate(5);

        $this->buys = MonInv::where('client_id',$this->client_id)
        ->where('type','purchase')
        ->orderBy('created_at', 'desc')->get();
        
        $this->sells = MonInv::where('client_id',$this->client_id)
        ->where('type','sale')
        ->orderBy('created_at', 'desc')->get();

        return view('livewire.monthly-docs-list',['docs'=>$this->Docs,'cid'=>$this->client_id,'buys'=>$this->buys,'sells'=>$this->sells ]);
    }
}
