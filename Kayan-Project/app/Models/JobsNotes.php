<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobsNotes extends Model
{
    protected $table = 'jobs_notes';

    public function job(): BelongsTo
    {
        return $this->belongsTo(Emp_jobs::class, 'job_id');
    }
}
