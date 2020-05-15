<?php

namespace App\QueryFilters;

//A Closure is an anonymous function. Closures are often used as callback methods and can be used as a parameter in a function. and you need Handle

use Closure;

class Active extends Filter
{
    protected function applyFilter($bulider)
    {
        return $bulider->where($this->filterName(), request($this->filterName()));
    }
}
