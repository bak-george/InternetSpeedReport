<?php

namespace App\Http\Filters\V1;

class DataFilter extends QueryFilter
{
    protected $sortable = [
        'name',
        'createdAt' => 'created_at',
        'ping',
        'download',
        'upload'
    ];

    public function createdAt($value)
    {
        $dates = explode(',', $value);

        if (count($dates) > 1) {
            return $this->builder->whereBetween('created_at', $dates);
        }

        return $this->builder->whereDate('created_at', $value);
    }
}
