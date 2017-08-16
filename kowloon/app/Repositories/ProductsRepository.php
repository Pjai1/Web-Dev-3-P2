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

    public function getById($id)
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

    public function getRelatedProducts($product, $productId)
    {
        return Product::where('category_id', $product->category_id)->where('id', '!=', $productId)->take(4)->get();
    }

    public function getRelatedFaqs($productId)
    {
        return Product::find($productId)->faqs()->get();
    }

    public function getRelatedImages($productId)
    {
        return Product::find($productId)->productImages->take(3);
    }
}