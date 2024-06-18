<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable=['image'];

    public function image():string
    {
        return $this->image ? asset('storage/'.$this->image) : "null";
    }
}
