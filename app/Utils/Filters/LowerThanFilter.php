<?php

namespace App\Utils\Filters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class LowerThanFilter implements Filter
{
    public function __invoke(Builder $query, $value, string $propety)
    {
        $query->where($propety, '<=' , $value);
    }
}