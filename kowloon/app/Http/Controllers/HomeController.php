<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CarouselImageRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\HotItemRepository;
use Session;

class HomeController extends Controller
{
    private $carousel;
    private $categories;
    private $hot_items;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CarouselImageRepository $carousel, CategoriesRepository $categories, HotItemRepository $hot_items)
    {
        $this->carousel = $carousel;
        $this->categories = $categories;
        $this->hot_items = $hot_items;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousel = $this->carousel->getAll();
        $categories = $this->categories->getAll();
        $hot_items = $this->hot_items->getAll();

        return view('home', [
            'carousel' => $carousel,
            'categories' => $categories,
            'hotitems' => $hot_items
        ]);
    }
}
