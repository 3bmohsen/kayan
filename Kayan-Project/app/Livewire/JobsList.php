<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Clients;
use App\Models\Emp_jobs;
use App\Models\Employees;
use App\Models\JobsNotes;
use Livewire\WithPagination;

class JobsList extends Component
{
    use WithPagination;
    public $job_details='';
    public $status='';
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
            if ($this->job_details) {
                $query->orWhere('job_details', 'like', '%' . $this->job_details . '%');
            }
            if ($this->status) {
                $query->orWhere('status', 'like', '%' . $this->status . '%');
            }
            if ($this->exp) {
                $query->orWhere('exp', $this->exp);
            }
        })->where('employee_id', $this->emp_id)
        ->orderBy('updated_at', 'desc')
        ->paginate(5);  
        $clients = Clients::all();  
        $emp = Employees::find($this->emp_id);
        $notes = JobsNotes::orderBy('created_at', 'desc')
        ->paginate(5);
        $emps = Employees::all();
        return view('livewire.jobs-list', compact('empJobs','clients','emp','notes','emps'));    }
}
