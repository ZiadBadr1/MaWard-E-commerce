<?php

namespace App\Actions\Images;

class DeleteImageAction
{
    public function execute($path): void
    {
        \Storage::disk('public')->delete($path);
    }
}