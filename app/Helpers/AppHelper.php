<?php

namespace App\Helpers;

use Normalizer;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class AppHelper
{
    /**
     * it will change the string to a slug
     * @param mixed $value
     * @return string
     */
    public static function CreateSlug(string $value, ?Model $model = null, $column_name = 'slug')
    {
        // 1. Normalize Unicode (combine compound characters correctly)
        if (class_exists('Normalizer')) {
            $value = \Normalizer::normalize($value, \Normalizer::FORM_C);
        }

        // 2. Improved regex to preserve Bangla characters and their components
        // This keeps letters, numbers, marks (like virama), and whitespace
        $slug = preg_replace('/[^\p{L}\p{M}\p{N}\s]/u', '', $value);

        // 3. Replace all whitespace (spaces, tabs, newlines) with hyphens
        $slug = preg_replace('/\s+/u', '-', $slug);

        // 4. Trim hyphens
        $slug = trim($slug, '-');

        // 5. Lowercase (for Latin characters — Bangla is not case-sensitive)
        $slug = mb_strtolower($slug, 'UTF-8');

        // 6. Ensure uniqueness if a model is passed
        if ($model) {
            $originalSlug = $slug;
            $count = 1;
            $modelClass = get_class($model);
            while ($modelClass::where($column_name, $slug)->exists()) {
                $slug = "{$originalSlug}-{$count}";
                $count++;
            }
        }

        return $slug;
    }

    /**
     * it will change the string to a snake case
     * @param mixed $value
     * @return string
     */
    public static function CreateSnake($value)
    {
        return Str::snake($value);
    }
}
