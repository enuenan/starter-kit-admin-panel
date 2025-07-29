<?php

namespace App\DataTransferObjects;

use Illuminate\Http\UploadedFile;
use App\Repositories\ImageRepository;

class BaseDTO
{
    public function getImageLinks(UploadedFile $uploaded_file, string $directory, ?int $width = null, ?int $height = null)
    {
        $imageRepository = (new ImageRepository)->storeImage(
            image: $uploaded_file,
            width: $width,
            height: $height,
            directory: $directory,
        );

        return $imageRepository;
    }

    function toArray()
    {
        return @json_decode(json_encode($this), true);
    }
}
