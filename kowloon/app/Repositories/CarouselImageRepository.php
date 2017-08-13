<?php

namespace App\Repositories;

use App\CarouselImage;

class CarouselImageRepository
{
    /**
     * Get all of the entrys
     *
     * @return Collection
     */
    public function getAll()
    {
        return CarouselImage::all();
    }
}