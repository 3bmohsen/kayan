<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Missions extends Model
{
    protected $table = 'missions';
    public function clients(): HasMany
    {
        return $this->hasMany(clients::class);
    }
}
