<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Activites extends Model
{
    protected $table = 'activites';
    public function client(): BelongsTo
    {
        return $this->belongsTo(Clients::class, 'client_id');
    }
    
}
