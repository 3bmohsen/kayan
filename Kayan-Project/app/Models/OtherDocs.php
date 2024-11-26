<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Model;

class OtherDocs extends Model
{
    protected $table = 'other_docs';
    public function client(): BelongsTo
    {
        return $this->belongsTo(Clients::class, 'client_id');
    }
}
