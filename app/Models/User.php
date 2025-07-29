<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Helpers\AppHelper;
use Illuminate\Support\Str;
use App\ModelFilters\UserFilter;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use eloquentFilter\QueryFilter\ModelFilters\Filterable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use UserFilter, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function boot()
    {
        parent::boot();

        /**
         * Auto updates the Username 
         */
        static::creating(function ($model) {
            $value = $model->username ?? $model->name;
            $model->username = AppHelper::CreateSlug($value, $model, 'username');
        });
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function about(): HasOne
    {
        return $this->hasOne(About::class);
    }

    public function header(): HasOne
    {
        return $this->hasOne(Header::class);
    }

    public function userSkills(): HasMany
    {
        return $this->hasMany(UserSkill::class);
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function userSettings(): HasMany
    {
        return $this->hasMany(related: UserSetting::class);
    }

    // $this->attr_theme
    protected function attrTheme(): Attribute
    {
        return Attribute::make(function () {
            if ($this->userSettings()?->where('key', 'theme')->first()) {
                $theme = json_decode($this->userSettings()->where('key', 'theme')->first()->value, true);
                return $theme['theme_id'] ? Theme::find($theme['theme_id']) : Theme::first();
            } else {
                return Theme::first();
            }
        });
    }

    // $this->attr_theme_id
    protected function attrThemeId(): Attribute
    {
        return Attribute::make(function () {
            return $this->attr_theme->id;
        });
    }

    // $this->is_admin
    protected function isAdmin(): Attribute
    {
        return Attribute::make(function () {
            return $this->role === 'admin';
        });
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->map(fn(string $name) => Str::of($name)->substr(0, 1))
            ->implode('');
    }

    public function scopeWhereNameLike(Builder $builder, string $name)
    {
        return $builder->where('name', 'like', '%' . $name . '%');
    }

    public function scopeWhereUsernameLike(Builder $builder, string $username)
    {
        return $builder->where('username', 'like', '%' . $username . '%');
    }

    public function scopeWhereEmailLike(Builder $builder, string $email)
    {
        return $builder->where('email', 'like', '%' . $email . '%');
    }
}
