<?php

namespace App\Traits;

trait SearchTraits
{
    public function applySearch($query, $key, $columns = [])
    {
        if ($key) {
            $query->where(function ($q) use ($key, $columns) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'LIKE', '%' . $key . '%');
                }
            });
        }
        return $query;
    }
}