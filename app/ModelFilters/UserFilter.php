<?php

namespace App\ModelFilters;

use Illuminate\Database\Eloquent\Builder;

trait UserFilter
{
    protected static array $whiteListFilter = [
        'name',
        'username',
        'email',
    ];

    /**
     * This is a sample custom query
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param                                       $value
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function filterCustomSearch(Builder $builder, $value)
    {
        return $builder->where('name', 'like', '%' . $value . '%')
            ->orWhere('username', 'like', '%' . $value . '%')
            ->orWhere('email', 'like', '%' . $value . '%');
    }
}
