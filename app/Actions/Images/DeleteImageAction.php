<?php

namespace App\Actions\Images;

class DeleteImageAction
{
    public function execute($path)
    {
        \Storage::disk('public')->delete($path);
    }
}