<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class MonInv extends Model
{
    protected $table = 'monthly_invoices';
    public function client(): BelongsTo
    {
        return $this->belongsTo(Clients::class, 'client_id');
    }
    public function _added_val(): BelongsTo
    {
        return $this->belongsTo(Addedval::class, 'Mondoc_id ');
    }
}
