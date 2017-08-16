<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Repositories\ProductsRepository;
use App\Repositories\CategoriesRepository;

class SearchController extends Controller
{
    private $products;
    private $categories;

    public function __construct(ProductsRepository $products, CategoriesRepository $categories) {
        $this->products = $products;
        $this->categories = $categories;
    }

    public function index(Request $request) {
        $data = null;
        $searchStr = ''; 
        $searchResults = null;
        $minPrice = 0;
        $maxPrice = 0;
        $selectedCategories = [];

        $categories = $this->categories->getAll();

        if($request->categories) {
            $selectedCategories = $request->categories;
        } else {
            foreach ($categories as $key => $category) {
                array_push($selectedCategories, $category->id);
            }
        }

        if(is_numeric($request->query('minprice')) && is_numeric($request->query('maxprice'))) {
            $minPrice = $request->query('minprice');
            $maxPrice = $request->query('maxprice');
        } else {
            $minPrice = $this->products->sortByPrice();
            $maxPrice = $this->products->sortByPriceDesc();
        }

        if($request->query('query')) {
            $searchStr = strip_tags($request->query('query'));

            if (!empty($searchStr) && !ctype_space($searchStr)) {
                $splitStr = preg_split('/\s+/', $searchStr, -1, PREG_SPLIT_NO_EMPTY);

                if($request->categories) {
                    $searchResults = $this->products->getMassRelatedProducts($request->categories, $minPrice, $maxPrice)->where(function($q) use ($splitStr) {

                        foreach ($splitStr as $key => $string) {
                            $q->orWhere('name', 'like', '%'.$string.'%')->orWhere('description', 'like', '%'.$string.'%')->orWhere('technical_info', 'like', '%'.$string.'%');
                        }
                    })->paginate(3);
                }
            } else {
                $minPrice = $request->query('minprice');
                $maxPrice = $request->query('maxprice');
    
                $searchResults = $this->products->getProductsByPrice($minPrice, $maxPrice)->where(function($q) use ($splitStr) {
    
                    foreach ($splitStr as $key => $string) {
                        $q->orWhere('name', 'like', '%'.$string.'%')->orWhere('description', 'like', '%'.$string.'%')->orWhere('technical_info', 'like', '%'.$string.'%');
                    }
                })->paginate(3);
            }

            foreach (Input::except('page') as $input => $value)
            {
                $searchResults->appends($input, $value);
            }

        } else {
            $data = 'Ongeldige zoekopdracht.';
        }


        return view('search', [
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'searchStr' => $searchStr,
            'results' => $searchResults,
            'data' => $data,
            'selectedCategories' => $selectedCategories,
            'categories' => $categories
        ]);
    }
}
