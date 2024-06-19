<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occasion extends Model
{
    protected $fillable= ['name', 'icon'];

    public function icon():string
    {
        return $this->icon ? asset('storage/'.$this->icon)  : "null";
    }
}
