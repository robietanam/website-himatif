<?php

namespace App\Repositories;

use Yajra\DataTables\DataTables;
use App\Models\ProkerDivision;

class ProkerDivisionRepository
{
    public function get(array $condition = [])
    {
        return ProkerDivision::when(count($condition) > 0, function ($q) use ($condition) {
            $q->where($condition);
        })->get();
    }
}
