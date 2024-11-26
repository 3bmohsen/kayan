<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PersonalDocs extends Model
{
    protected $table = 'personal_docs';
    public function client(): BelongsTo
    {
        return $this->belongsTo(Clients::class, 'client_id');
    }
    public function notf(): HasMany
    {
        return $this->hasMany(notf::class);
    }
}
