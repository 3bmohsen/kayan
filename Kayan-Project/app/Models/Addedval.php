<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Addedval extends Model
{
       protected $table = '_added_val';
    public function client(): BelongsTo
    {
        return $this->belongsTo(Clients::class, 'client_id');
    }
    public function MonInv(): HasMany
    {
        return $this->hasMany(MonInv::class);
    }
}
