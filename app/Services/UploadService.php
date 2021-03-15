<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadService
{
    public function generateFileName($file)
    {
        return time() . '_' . $file->getClientOriginalName();
    }

    public function uploadFile(UploadedFile $file, $folder = ''): array
    {
        $title = $this->generateFileName($file);

        $uploadedFile = $file->storePubliclyAs($folder, $title);

        return [
            'path'  => $uploadedFile,
            'url'   => Storage::url($uploadedFile),
        ];
    }
}


