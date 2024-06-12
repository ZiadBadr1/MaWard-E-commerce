<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Designer extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'avatar'];
}
