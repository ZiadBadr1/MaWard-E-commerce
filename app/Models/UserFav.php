<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFav extends Model
{
    protected $fillable = ['product_id', 'user_id'];
}
