<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CarouselImageRepository;

class HomeController extends Controller
{
    private $carousel;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CarouselImageRepository $carousel)
    {
        $this->carousel = $carousel;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousel = $this->carousel->getAll();

        return view('home', [
            'carousel' => $carousel
        ]);
    }
}
