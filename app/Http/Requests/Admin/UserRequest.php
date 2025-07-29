<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use Illuminate\Validation\Rule;
use App\DataTransferObjects\UserDTO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->is_admin;
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
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'string',
                'email:rfc,dns,spoof',
                'max:255',
                Rule::unique(app(User::class)->getTable(), 'email')
                    ->ignore($this->route('user')?->id),
            ],
            'password' => [
                $method === 'POST' ? 'required' : 'nullable',
                'string',
                'min:6',
            ],
        ];
    }

    public function DTO(): UserDTO
    {
        return (new UserDTO)->fromRequest($this);
    }
}
