<?php

namespace App\QueryFilters;

use Closure;
use Illuminate\Support\Str;

abstract class Filter
{
    public function Handle($request, Closure $next)
    {
        if (!request()->has($this->filterName())) {
            return $next($request);
        }

        $bulider = $next($request);

        return $this->applyFilter($bulider);
    }

    protected abstract function applyFilter($bulider);

    protected function filterName()
    {
        return  Str::snake(class_basename($this));
    }
}
