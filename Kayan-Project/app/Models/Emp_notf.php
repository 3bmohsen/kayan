<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emp_notf extends Model
{
    protected $table = 'emp_notf';
    protected $fillable = [
        'emp_id',
        'message',
        'is_read',
    ];
    public function employee()
    {
        return $this->belongsTo(Employees::class, 'emp_id');
    }
}
