<?php

namespace App\Http\Requests\User;

use App\Models\Skill;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\DataTransferObjects\UserSkillDTO;
use App\Repositories\UserSkillRepository;
use Illuminate\Foundation\Http\FormRequest;

class UserSkillRequest extends FormRequest
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
        // Get the ID of the current user_skill being updated (or null on create)
        $userSkill = $this->route('user_skill'); // Could be an object or ID depending on route binding

        // Get the ID value (handle both model binding or direct ID)
        $userSkillId = is_object($userSkill) ? $userSkill->id : $userSkill;

        return [
            'skill_id' => [
                'required',
                'exists:' . app(Skill::class)->getTable() . ',id',
                Rule::unique('user_skills', 'skill_id')
                    ->where(function ($query) {
                        return $query->where('user_id', Auth::id());
                    })
                    ->ignore($userSkillId), // Ignore the current record
            ],
            'description' => [
                'nullable',
                'string',
                'max:255',
            ],
        ];
    }

    public function DTO(): UserSkillDTO
    {
        return (new UserSkillDTO)->fromRequest($this);
    }
}
