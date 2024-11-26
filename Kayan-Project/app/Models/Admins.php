<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Admins extends Authenticatable
{
    
    protected $table = 'admins';
}
