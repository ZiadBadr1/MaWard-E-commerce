<?php

namespace App\Models;

use App\Traits\HashesPasswords;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HashesPasswords;
    protected $fillable = ['name', 'email', 'password', 'avatar'];



}
