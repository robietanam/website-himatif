<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function get()
    {
        return Category::all();
    }
}
