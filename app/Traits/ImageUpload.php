<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ImageUpload{

    public function imageUpload(UploadedFile $uploadedFile, $folder = null, $disc = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(19);
        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disc);
        return $file;
    }
}