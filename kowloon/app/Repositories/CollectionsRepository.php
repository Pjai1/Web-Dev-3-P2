<?php

namespace App\Repositories;

use App\Collection;

class CollectionsRepository
{
    /**
     * Get all of the entrys
     *
     * @return Collection
     */
    public function getAll()
    {
        return Collection::all();
    }
}