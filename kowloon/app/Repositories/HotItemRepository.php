<?php

namespace App\Repositories;

use App\HotItem;

class HotItemRepository
{
    /**
     * Get all of the entrys
     *
     * @return Collection
     */
    public function getAll()
    {
        return HotItem::all();
    }
}