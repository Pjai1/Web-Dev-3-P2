<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductsRepository;
use App\Product;
use LaravelLocalization;

class ProductDetailController extends Controller
{
    private $products;

    public function __construct(ProductsRepository $products) {
        $this->products = $products;
    }

    public function index($categoryId, $productId) {
        $product = $this->products->getById($productId);

        if($product) {
            $relatedProducts = $this->products->getRelatedProducts($product, $productId);
            $faqs = $this->products->getRelatedFaqs($productId);
            $images = $this->products->getRelatedImages($productId);

            return view('productdetail', [
                'product' => $product,
                'faqs' => $faqs,
                'images' => $images,
                'relatedProducts' => $relatedProducts
            ]);
        }
    }
}
