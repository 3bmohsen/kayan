<?php

namespace App\Livewire;
use App\Models\Clients;
use App\Models\Missions;
use Livewire\Component;
use Livewire\WithPagination;

class ClientsList extends Component
{
    use WithPagination;


    public $code = ''; // خاصية البحث عن الكود
    public $phone = ''; // خاصية البحث عن الهاتف
    public $name = ''; // خاصية البحث عن الاسم

    public $mission = '';
    public function render()
    {
        $this->missions = Missions::all();
        // استعلام مع دعم البحث عن الكود أو رقم الهاتف أو الاسم
        $this->clients = Clients::where(function ($query) {
            if ($this->mission) {
                $query->orWhere('mission_id', 'like', '%' . $this->mission . '%');
            }
                if ($this->code) {
                    $query->where('code', 'like', '%' . $this->code . '%');
                }

                if ($this->phone) {
                    $query->orWhere('phone', 'like', '%' . $this->phone . '%');
                }

                if ($this->name) {
                    $query->orWhere('name', 'like', '%' . $this->name . '%');
                }

            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.clients-list',['clients'=>$this->clients,'missions' => $this->missions]);
    }
}
