<?php
namespace App\Filters\Contact;

use Fouladgar\EloquentBuilder\Support\Foundation\Contracts\IFilter as Filter;
use Illuminate\Database\Eloquent\Builder;

class FirstNameFilter implements Filter
{
    /**
     * Apply the age condition to the query.
     *
     * @param Builder $builder
     * @param mixed   $value
     *
     * @return Builder
     */
    public function apply(Builder $builder, $value): Builder
    {
        if (is_array($value)) {
            return $builder->where('first_name', 'NOT LIKE', '%' . $value['not'] . '%');
        }

        return $builder->where('first_name', 'LIKE', '%' . $value . '%');
    }
}
