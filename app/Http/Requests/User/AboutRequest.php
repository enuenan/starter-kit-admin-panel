<?php

namespace App\Http\Requests\User;

use Illuminate\Support\Facades\Auth;
use App\DataTransferObjects\AboutDTO;
use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
{
    const FILE_TYPE_JPG = 'jpg';
    const FILE_TYPE_JPEG = 'jpeg';
    const FILE_TYPE_PNG = 'png';
    const MAX_WIDTH = '1920';
    const MAX_HEIGHT = '1080';
    const FILE_MAX_SIZE =  2 * 1024;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        return [
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'description' => [
                'required',
                'string',
                'max:1000'
            ],
            'image' => [
                $method == 'POST' ? 'required' : 'nullable',
                'image',
                File::image()
                    ->types([self::FILE_TYPE_JPG, self::FILE_TYPE_JPEG, self::FILE_TYPE_PNG])
                    ->max(self::FILE_MAX_SIZE),
            ],
        ];
    }

    public function DTO(): AboutDTO
    {
        return (new AboutDTO)->fromRequest($this);
    }
}
