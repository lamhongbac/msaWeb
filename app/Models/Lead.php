<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = ['fullname', 'phone', 'company', 'problem', 'category', 'is_read'];
}
