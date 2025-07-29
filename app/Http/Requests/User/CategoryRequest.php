<?php

namespace App\Http\Requests\User;

use App\DataTransferObjects\CategoryDTO;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
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
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:' . app(Category::class)->getTable(),
            ]
        ];
    }

    public function DTO(): CategoryDTO
    {
        return (new CategoryDTO)->fromRequest($this);
    }
}
