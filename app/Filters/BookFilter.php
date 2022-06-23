<?php

namespace App\Filters;

use Illuminate\Support\Facades\Schema;

class BookFilter extends QueryFilter
{
    public function category_id($id = null)
    {
        return $this->builder->when($id, function($query) use($id){
            $query->where('category_id', $id);
        });
    }

    public function search_field($search_string = '')
    {
        return $this->builder
            ->where('name', 'LIKE', '%' . $search_string . '%');
    }

    public function author_id($id = null)
    {
        return $this->builder->when($id, function($query) use($id){
            $query->where('author_id', $id);
        });
    }

    public function sort_asc($by = '')
    {

        if (isset($value['by']) && ! Schema::hasColumn('books', $value['by'])) {
            return $this->builder;
        }

        return $this->builder->orderBy($by, 'asc');
    }

}
