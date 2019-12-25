<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ListingFilter extends QueryFilters
{
    /**
     * Filter by user_id
     *
     * @param  string $user_id
     * @return Builder
     */
    public function user_id($user_id)
    {
        return $this->builder->where('submitter_id', $user_id);
    }
}
