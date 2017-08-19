<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\HotItemRepository;
use App\Repositories\ProductsRepository;
use Session;

class AdminController extends Controller
{
    private $hotItems;
    private $products;

    public function __construct(HotItemRepository $hotItems, ProductsRepository $products) {
        $this->hotItems = $hotItems;
        $this->products = $products;
    }

    public function index() {
        $products = $this->products->getAll();
        $hotItems = $this->hotItems->getAll();

        return view('admin.dashboard', [
            'hotitems' => $hotItems,
            'products' => $products
        ]);
    }

    public function updateHotItem(Request $request) {
        foreach($request->hotitems as $key => $ht_id) {
            $hotItems = $this->hotItems->getById($key+1);
            $hotItems->product_id = $ht_id;
            $ht->save();
        }

        Session::flash('hotitems_update', 'Hot items updated!');

        return back();
    }
}
