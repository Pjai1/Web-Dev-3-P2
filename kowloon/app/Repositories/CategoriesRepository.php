<?php

namespace App\Repositories;

use App\Category;

class CategoriesRepository
{
    /**
     * Get all of the entrys
     *
     * @return Collection
     */
    public function getAll()
    {
        return Category::all();
    }
}