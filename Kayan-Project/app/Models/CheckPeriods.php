<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CheckPeriods extends Model
{
    protected $table = 'check_periods';
    public function client(): BelongsTo
    {
        return $this->belongsTo(Clients::class, 'client_id');
    }}
