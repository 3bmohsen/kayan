<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notf extends Model
{
    protected $table = 'notifications';
    public function client()
{
    return $this->belongsTo(Clients::class, 'client_id');
}
    public function file()
{
    return $this->belongsTo(PersonalDocs::class, 'file_id');
}
    
}
