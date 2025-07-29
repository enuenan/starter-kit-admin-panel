<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    protected static bool $withHeader = false;

    public function withHeader()
    {
        self::$withHeader = true;
        return $this;
    }

    protected static bool $withAbout = false;

    public function withAbout()
    {
        self::$withAbout = true;
        return $this;
    }

    protected static bool $withSkills = false;

    public function withSkills()
    {
        self::$withSkills = true;
        return $this;
    }

    protected static bool $withExperiences = false;

    public function withExperiences()
    {
        self::$withExperiences = true;
        return $this;
    }

    protected static bool $withProjects = false;

    public function withProjects()
    {
        self::$withProjects = true;
        return $this;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $resource = [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'settings' => SettingsResource::getInstance($this->settings)->transformPayload(),
            'sections' => [
                'header' => HeaderResource::getInstance($this->header)->transformPayload(),
                'about' => AboutResource::getInstance($this->about)->transformPayload(),
                'skills' => UserSkillResource::getInstance($this->userSkills)->transformPayload(),
                'experience' => ExperienceResource::getInstance($this->experiences)->transformPayload(),
                'projects' => ProjectResource::getInstance($this->projects)->transformPayload(),
            ],
        ];

        // return parent::toArray($request);

        return $resource;
    }
}
