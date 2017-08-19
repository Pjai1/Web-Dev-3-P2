<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Repositories\CarouselImageRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\CollectionsRepository;
use App\Repositories\ProductsRepository;
use LaravelLocalization;

class CategoryController extends Controller
{
    private $carousel;
    private $categories;
    private $collections;
    private $products;

    public function __construct(CarouselImageRepository $carousel, CategoriesRepository $categories, CollectionsRepository $collections, ProductsRepository $products)
    {
        $this->carousel = $carousel;
        $this->categories = $categories;
        $this->collections = $collections;
        $this->products = $products;
    }

    public function index($id, Request $request) {
        $selectedCollections = [];
        $carousel = $this->carousel->getAll();
        $categories = $this->categories->getById($id);
        $collections = $this->collections->getAll();
        $query = $this->products->getByCategory($id);
        $minimumPrice = 0;
        $maximumPrice = 0; 
        $sortBy = '';
        $sortOrder = '';
        $productsPerPage = 4;

        if($request->collections) {
            $selectedCollections = $request->collections;
            // dd($selectedCollections);

            foreach($selectedCollections as $key => $collectionId) {
                $query->whereHas('collections', function($q) use ($collectionId) {
                    $q->where('collection_id', $collectionId);
                });
            }
        }

        switch($request->query('sort')) {
            case 'price_asc': 
                $sortBy = 'price';
                $sortOrder = 'asc';
                break;

            case 'price_desc':
                $sortBy = 'price';
                $sortOrder = 'desc';
                break;

            case 'oldest':
                    $sortBy = 'created_at';
                    $sortOrder = 'asc';
                break;

            case 'latest':
                $sortBy= 'created_at';
                $sortOrder = 'desc';
                break;

            default: 
                $sortBy = 'created_at';
                $sortOrder = 'desc';
        }

        if(is_numeric($request->query('minprice')) && is_numeric($request->query('maxprice'))) {
            $minimumPrice = $request->query('minprice');
            $maximumPrice = $request->query('maxprice');

            $products = $query->whereBetween('price', [$minimumPrice, $maximumPrice])->orderBy($sortBy, $sortOrder)->paginate($productsPerPage);

        } else {
            $allProducts = $this->products->getAll();

            if($allProducts->count()) {
                $lowestPricedProduct = $allProducts->sortBy('price')->first();
                $highestPricedProduct = $allProducts->sortByDesc('price')->first();

                $minimumPrice = $lowestPricedProduct->price;
                $maximumPrice = $highestPricedProduct->price;
            }

            $products = $query->orderBy($sortBy, $sortOrder)->paginate($productsPerPage);
        }

        foreach (Input::except('page') as $input => $value)
        {
            $products->appends($input, $value);
        }

        return view('productview', [
            'products' => $products,
            'carousel' => $carousel,
            'category' => $categories,
            'collections' => $collections,
            'selectedCollections' => $selectedCollections,
            'minimumPrice' => $minimumPrice,
            'maximumPrice' => $maximumPrice
        ]);
    }
}
