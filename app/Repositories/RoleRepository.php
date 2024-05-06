<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository
{
    public function get()
    {
        return Role::all();
    }
}
