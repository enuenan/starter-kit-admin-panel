<?php

namespace App\Http\Requests\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use App\DataTransferObjects\HeaderDTO;
use Illuminate\Foundation\Http\FormRequest;

class HeaderRequest extends FormRequest
{
    const FILE_TYPE_JPG = 'jpg';
    const FILE_TYPE_JPEG = 'jpeg';
    const FILE_TYPE_PNG = 'png';
    const MAX_WIDTH = '1920';
    const MAX_HEIGHT = '1080';
    const FILE_MAX_SIZE = 2 * 1024;
    const FILE_MAX_INPUT = 1;

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
        $rules = [
            'title' => [
                'required',
                'array',
                'min:1',
            ],
            'tag' => [
                'required',
                'string',
            ],
            'image' => [
                $method == 'POST' ? 'required' : 'nullable',
                File::image()
                    ->types([self::FILE_TYPE_JPG, self::FILE_TYPE_JPEG, self::FILE_TYPE_PNG])
                    ->max(self::FILE_MAX_SIZE),
            ],
        ];

        return $rules;
    }

    public function DTO()
    {
        return (new HeaderDTO)->fromRequest($this);
    }
}
