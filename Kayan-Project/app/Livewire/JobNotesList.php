<?php

namespace App\Livewire;

use App\Models\JobsNotes;
use Livewire\Component;

class JobNotesList extends Component
{
    public $jobid;

    public function mount($id)
    {
        $this->jobid = $id;
    }
    public function render()
    {
        $notes = JobsNotes::where('job_id',$this->jobid)
        ->orderBy('created_at', 'desc')
        ->paginate(5);
        return view('livewire.job-notes-list',compact('notes'));
    }
}
