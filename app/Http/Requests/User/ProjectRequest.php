<?php

namespace App\Http\Requests\User;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use App\DataTransferObjects\ProjectDTO;
use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'category_ids' => [
                'nullable',
                'array',
            ],
            'category_ids.*' => [
                'exists:' . app(Category::class)->getTable() . ',id'
            ],
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'description' => [
                'nullable',
                'string',
                'max:255',
            ],
            'client_name' => [
                'nullable',
                'string',
                'max:255',
            ],
            'start_date' => [],
            'end_date' => [
                'date',
                'after_or_equal:start_date'
            ],
            'git_url' => [
                'nullable',
                'string',
                'max:255',
            ],
            'live_url' => [
                'nullable',
                'string',
                'max:255',
            ],
            'image' => [
                $method == 'POST' ? 'required' : 'nullable',
                'image',
                File::image()
                    ->types([self::FILE_TYPE_JPG, self::FILE_TYPE_JPEG, self::FILE_TYPE_PNG])
                    ->max(self::FILE_MAX_SIZE),
            ],
            'screenshots' => [
                'array',
            ],
            'screenshots.*' => [
                'image',
                File::image()
                    ->types([self::FILE_TYPE_JPG, self::FILE_TYPE_JPEG, self::FILE_TYPE_PNG])
                    ->max(self::FILE_MAX_SIZE),
            ],
        ];
    }

    public function DTO(): ProjectDTO
    {
        return (new ProjectDTO)->fromRequest($this);
    }
}
