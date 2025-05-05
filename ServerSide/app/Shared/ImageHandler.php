<?php

namespace App\Shared;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class ImageHandler
{
    public static function saveImage(FormRequest $request, string $file, string $path, array $options = null)
    {
        return $request->file($file)->store($path, $options);
    }

    public static function deleteImage(string $file, string $diskType)
    {
        Storage::disk($diskType)->delete($file);
    }

    public static function isImageExistsInStorage($diskType, $imagePath)
    {
        return Storage::disk($diskType)->exists($imagePath);
    }
}
