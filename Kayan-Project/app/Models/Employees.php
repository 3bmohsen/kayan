<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employees extends Authenticatable

{
    
    protected $table = 'employees';
    public function Emp_jobs(): HasMany
    {
        return $this->hasMany(Emp_jobs::class);
    }
    public function notf(): HasMany
    {
        return $this->hasMany(Emp_notf::class);
    }
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
