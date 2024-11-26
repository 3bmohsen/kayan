<?php

namespace App\Livewire;
use App\Models\Clients;
use App\Models\Emp_jobs;
use App\Models\Employees;
use App\Models\JobsNotes;
use Livewire\WithPagination;
use Livewire\Component;

class EmpJobsList extends Component
{
    use WithPagination;
    public $status='';
    public $clientt = '';
    public $exp='';
    public $emp_id='';
    public function mount($id)
    {
        $this->emp_id = $id;
    }
    public function render()
    {
        
        $empJobs = Emp_jobs::with('client')
        ->where(function ($query) {
            if ($this->status) {
                $query->orWhere('status', 'like', '%' . $this->status . '%');
            }
            if ($this->exp) {
                $query->where('exp', $this->exp);
            }
            if ($this->clientt) {
                $query->where('client_id', $this->clientt);
            }
        })->where('employee_id', $this->emp_id)
        ->orderBy('updated_at', 'desc')
        ->paginate(10);  
        $clients = Clients::all();
        return view('livewire.emp-jobs-list', compact('empJobs' ,'clients'));
    }
}
