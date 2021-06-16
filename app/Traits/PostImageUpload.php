<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


trait PostImageUpload{

    public function postImageUpload($query)
    {
        $imagName = Str::random(20);
        $ext = strtolower($query->getClientOriginalExtension());
        $imageFullName = $imagName.'.'.$ext;
        $uploadPath = 'post/';
        $imageUrl = $uploadPath.$imageFullName;
        $success = $query->move($uploadPath, $imageFullName);

        return $imageUrl;
    }
}