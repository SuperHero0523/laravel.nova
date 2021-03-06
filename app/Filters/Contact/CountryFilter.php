<?php
namespace App\Filters\Contact;

use Fouladgar\EloquentBuilder\Support\Foundation\Contracts\IFilter as Filter;
use Illuminate\Database\Eloquent\Builder;

class CountryFilter implements Filter
{
    /**
     * Apply the age condition to the query.
     *
     * @param Builder $builder
     * @param mixed   $value
     *
     * @return Builder
     */
    //TODO fix issue
    public function apply(Builder $builder, $value): Builder
    {
        if (is_array($value) && !empty($value['not'])) {
            return $builder->whereHas('addresses', function($q) use ($value) {
                $q->where('country', '!=', $value['not']);
            });
        }

        return $builder->whereHas('addresses', function($q) use ($value) {
            $q->where('country', $value);
        });
    }
}
