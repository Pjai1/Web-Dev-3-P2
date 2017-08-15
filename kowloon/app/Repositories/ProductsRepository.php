<?php

namespace App\Repositories;

use App\Product;

class ProductsRepository
{
    /**
     * Get all of the entrys
     *
     * @return Collection
     */
    public function getAll()
    {
        return Product::all();
    }

    public function getById()
    {
        return Product::find($id);
    }

    public function getByCategory($id)
    {
        return Product::where('category_id', $id);
    }

    public function getByPriceAndSort($minPrice, $maxPrice, $sortBy, $sortOrder)
    {
        return Product::whereBetween('price', [$minPrice, $maxPrice])->orderBy($sortBy, $sortOrder);
    }
}