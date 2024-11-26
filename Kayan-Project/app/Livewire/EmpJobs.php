<?php

namespace App\Livewire;

use App\Models\Emp_jobs;
use Livewire\Component;
use Livewire\WithPagination;

class EmpJobs extends Component
{    use WithPagination;

    public function render()
    {
        $this->jobs = Emp_jobs::orderBy('created_at', 'desc')
        ->paginate(10);
        return view('livewire.emp-jobs',['jobs'=> $this->jobs]);
    }
}
