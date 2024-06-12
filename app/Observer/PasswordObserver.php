<?php

namespace App\Observer;

use Illuminate\Support\Facades\Hash;

class PasswordObserver
{
    public function saving($model)
    {
        if ($model->isDirty('password')) {
            $model->password = Hash::make($model->password);
        }
    }
}