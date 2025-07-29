<?php

namespace App\DataTransferObjects;

use Illuminate\Support\Arr;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ImageRepository;

class AttachmentDTO extends BaseDTO
{
    public ?string  $user_id = '';
    public ?string  $type = '';
    public ?string  $original_attachment;
    public ?string  $resized_attachment;
    public ?string  $name;
    public ?string  $mime_type = null;

    public function fromRequest(UploadedFile $uploaded_file, string $directory, ?int $width = null, ?int $height = null): static
    {
        $attachment = (new ImageRepository)->storeImage(
            image: $uploaded_file,
            width: $width,
            height: $height,
            directory: $directory,
        );

        $this->user_id = Auth::user()->id;
        $this->mime_type = Arr::get($attachment, 'mime_type', '');
        $this->original_attachment = Arr::get($attachment, 'original', '');
        $this->resized_attachment = Arr::get($attachment, 'resized', '');
        $this->name = Arr::get($attachment, 'name', '');

        return $this;
    }

    public function setType(string $type = ''): static
    {
        $this->type = $type;

        return $this;
    }
}
