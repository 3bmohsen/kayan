<?php

namespace App\Livewire;

use App\Models\Client_money;
use App\Models\Clients;
use App\Models\Missions;
use Livewire\Component;
use Livewire\WithPagination;

class AllClientsMoney extends Component
{
    use WithPagination;
    public $code = ''; // خاصية البحث عن الكود
    public $phone = ''; // خاصية البحث عن الهاتف
    public $name = ''; // خاصية البحث عن الاسم

    public $mission = '';



    public function render()
    {
        $missions = Missions::all();

        $this->client = Clients::where(function ($query) {
            if ($this->code) {
                $query->where('code', 'like', '%' . $this->code . '%');
            }

            if ($this->phone) {
                $query->orWhere('phone', 'like', '%' . $this->phone . '%');
            }

            if ($this->name) {
                $query->orWhere('name', 'like', '%' . $this->name . '%');
            }
            if ($this->mission) {
                $query->orWhere('mission_id', 'like', '%' . $this->mission . '%');
            }
        })->get();
        $clientIds = $this->client->pluck('id')->toArray();

        // الحصول على النتائج من Client_money بناءً على المعرّفات
        $mon = Client_money::whereIn('client_id', $clientIds)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $clients=Clients::all();
        return view('livewire.all-clients-money',compact('mon','clients','missions'));
    }
}
