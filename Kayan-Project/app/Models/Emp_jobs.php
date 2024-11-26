<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Emp_jobs extends Model
{
    protected $table = 'emp_jobs';
    protected $fillable = [
        'status',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Clients::class, 'client_id');
    }
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employees::class, 'employee_id');
    }
    public function JobNote(): HasMany
    {
        return $this->hasMany(JobsNotes::class);
    }
}
