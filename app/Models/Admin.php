<?php

namespace App\Models;

use App\Traits\HashesPasswords;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HashesPasswords;
    protected $fillable = ['name', 'email', 'password', 'avatar'];


    public function avatar():string
    {
        return $this->avatar ? asset('storage/'.$this->avatar) : asset('assets/dashboard/images/avatars/uifaces1.jpg');
    }

}
