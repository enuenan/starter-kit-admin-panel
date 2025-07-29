<?php

namespace App\Http\Requests\User;

use Illuminate\Support\Facades\Auth;
use App\DataTransferObjects\ExperienceDTO;
use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
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
            'company_name' => [
                'required',
                'string',
                'max:255'
            ],
            'job_title' => [
                'required',
                'string',
                'max:255'
            ],
            'start_date' => [
                'required',
                'date'
            ],
            'end_date' => [
                'nullable',
                'date',
                'after_or_equal:start_date'
            ],
            'tags' => [
                'nullable',
                'string',
                'max:255'
            ],
            'description' => [
                'nullable',
                'string',
                'max:1000'
            ],
        ];
    }

    public function DTO(): ExperienceDTO
    {
        return (new ExperienceDTO)->fromRequest($this);
    }
}
