<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Clients extends Model
{
    protected $table = 'clients';

    public function Emp_jobs(): HasMany
    {
        return $this->hasMany(Emp_jobs::class);
    }
    public function Check_docs(): HasMany
    {
        return $this->hasMany(Check_docs::class);
    }
    public function taxDocs(): HasMany
    {
        return $this->hasMany(taxDocs::class);
    }
    public function Activites(): HasMany
    {
        return $this->hasMany(Activites::class);
    }
    public function Addedval(): HasMany
    {
        return $this->hasMany(Addedval::class);
    }
    public function PersonalDocs(): HasMany
    {
        return $this->hasMany(PersonalDocs::class);
    }
    public function OtherDocs(): HasMany
    {
        return $this->hasMany(OtherDocs::class);
    }
    public function MonInv(): HasMany
    {
        return $this->hasMany(MonInv::class);
    }
    public function CheckPeriods(): HasMany
    {
        return $this->hasMany(CheckPeriods::class);
    }
    public function missions(): BelongsTo
    {
        return $this->belongsTo(Missions::class, 'mission_id');
    }
}
