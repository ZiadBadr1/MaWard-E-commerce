<?php

namespace App\Actions\Images;

use Illuminate\Http\UploadedFile;

class StoreImageAction
{
    public function execute(UploadedFile $image, $storingPath)
    {
        $path = $image->store($storingPath, 'public');

        return $path;
    }
}