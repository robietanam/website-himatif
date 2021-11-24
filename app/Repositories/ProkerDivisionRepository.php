<?php

namespace App\Repositories;

use Yajra\DataTables\DataTables;
use App\Models\ProkerDivision;

class ProkerDivisionRepository
{
    public function get()
    {
        return ProkerDivision::all();
    }
}
