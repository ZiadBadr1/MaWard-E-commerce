<?php

namespace App\Traits;

use Illuminate\Support\Facades\Hash;

trait HashesPasswords
{
    public static function bootHashesPasswords(): void
    {
        static::saving(function ($model) {
            if ($model->isDirty('password')) {
                $model->password = Hash::make($model->password);
            }
        });
    }
}