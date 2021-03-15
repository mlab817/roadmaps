<?php

namespace App\Traits;


use App\Models\Upload;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait WithFileUpload
{
    public $file;

    public function handleUpload()
    {
        // upload file
        try {
            $uploadedFile = Storage::disk('google')->put(config('folders.reports'), $this->file);

            return Upload::create([
                'title' => '',
                'path'  => $uploadedFile,
                'url'   => Storage::disk('google')->url($uploadedFile),
                'uploader' => auth()->user()->id,
            ]);
        } catch (\Exception $e) {
            return $e;
        }
    }
}
