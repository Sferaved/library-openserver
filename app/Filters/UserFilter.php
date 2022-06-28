<?php

namespace App\Filters;

use Illuminate\Support\Facades\Schema;

class UserFilter extends QueryFilter
{

    public function search_field($search_string = '')
    {
        return $this->builder
            ->where('name', 'LIKE', '%' . $search_string . '%');
    }


    public function sort_asc($by = '')
    {

        if (isset($value['by']) && ! Schema::hasColumn('users', $value['by'])) {
            return $this->builder;
        }

        return $this->builder->orderBy($by, 'asc');
    }

}
