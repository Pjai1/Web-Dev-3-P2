<?php

namespace App\Repositories;

use App\Faq;

class FaqRepository
{
    /**
     * Get all of the entrys
     *
     * @return Collection
     */
    public function getAll()
    {
        return Faq::all();
    }
}