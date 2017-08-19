<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductsRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\CollectionsRepository;
use App\Repositories\HotItemRepository;
use App\Product;
use App\Category;
use App\Color;
use App\Dimension;
use App\ProductImage;
use Session;

class ProductController extends Controller
{
    private $products;
    private $hotItems;
    private $collections;
    private $categories;

    public function __construct(ProductsRepository $products, HotItemRepository $hotItems, CategoriesRepository $categories, CollectionsRepository $collections) {
        $this->products = $products;
        $this->categories = $categories;
        $this->hotItems = $hotItems;
        $this->collections = $collections;
    }

    public function index() {
        $products = $this->products->getAll();
        
        return view('admin.products', [
            'products' => $products
        ]);
    }

    public function create() {
        $categories = Category::take(5)->get();
        $collections = $this->collections->getAll();

        return view('admin.productcreate', [
            'categories' => $categories,
            'collections' => $collections
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'nl_name' => 'required',
            'fr_name' => 'required',
            'price' => 'required|numeric',
            'nl_description' => 'required',
            'fr_description' => 'required',
            'technical_info' => 'required',
            'category' => 'required',
            'image' => 'required',
            'image_desc_nl' => 'required',
            'image_desc_fr' => 'required'
        ]);

        $imageCount = count($request->image);

        $product = new Product();
        $product->category_id = $request->category;
        $product->nl_name = $request->nl_name;
        $product->fr_name = $request->fr_name;
        $product->nl_description = $request->nl_description;
        $product->fr_description = $request->fr_description;
        $product->technical_info  = $request->technical_info;
        $product->price = $request->price;
        $product->save();


        for ($i = 0; $i < $imageCount; $i++) { 
            $productImage = new ProductImage(); 
            $path = $request->image[$i]->store('img/', 'upload'); 
            $productImage->image_url = basename($path);
            $productImage->nl_description = $request->image_desc_nl[$i];
            $productImage->fr_description = $request->image_desc_fr[$i];
            $productImage->product()->associate($product);
            $productImage->save();
        }

        for ($i = 0; $i < count($request->colors); $i++) { 
            $color = new Color();
            $color->hexcode = $request->colors[$i];
            $color->product()->associate($product);
            $color->save();
        }

        for ($i = 0; $i < count($request->dimensions); $i++) { 
            $dimension = new Dimension();
            $dimension->specs = $request->dimensions[$i];
            $dimension->product()->associate($product);
            $dimension->save();
        }

        if($request->collections)
        {
            foreach ($request->collections as $key => $collection) 
            {
                $product->collections()->attach($collection);
            }
        }

        Session::flash('product_created', 'Product created successfully');
        
        return redirect()->action('ProductController@index');
    }

    public function edit($id) {
        $product = $this->products->getById($id);
        $categories = Category::take(5)->get();
        $collections = $this->collections->getAll();
        $colors = Color::where('product_id', $id)->get();
        $dimensions = Dimension::where('product_id', $id)->get();

        return view('admin.productedit', [
            'product' => $product,
            'categories' => $categories,
            'colors' => $colors,
            'dimensions' => $dimensions,
            'collections' => $collections
        ]);
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'nl_name' => 'required',
            'fr_name' => 'required',
            'price' => 'required|numeric',
            'nl_description' => 'required',
            'fr_description' => 'required',
            'technical_info' => 'required',
            'category' => 'required'
        ]);

        $imageCount = count($request->image);

        $product = $this->products->getById($id);
        $product->category_id = $request->category;
        $product->nl_name = $request->nl_name;
        $product->fr_name = $request->fr_name;
        $product->nl_description = $request->nl_description;
        $product->fr_description = $request->fr_description;
        $product->technical_info  = $request->technical_info;
        $product->price = $request->price;
        $product->save();

        $images = ProductImage::where('product_id', $id);
        $colors = Color::where('product_id', $id)->get();;
        $dimensions = Dimension::where('product_id', $id)->get();

        if($request->uploadedImages) {
            $images->whereNotIn('id', $request->uploadedImages)->delete();
        } else {
            if($request->image) {
                foreach ($images->get() as $key => $image) {
                    $image->delete();
                }
            }
        else {
                Session::flash('update_error', 'One image per product required');
                
                return back();
            }
        }

        for ($i = 0; $i < $imageCount; $i++) { 
            $productImage = new ProductImage(); 
            $path = $request->image[$i]->store('img/', 'upload'); 
            $productImage->image_url = basename($path);
            $productImage->nl_description = $request->image_desc_nl[$i];
            $productImage->fr_description = $request->image_desc_fr[$i];
            $productImage->product()->associate($product);
            $productImage->save();
        }

        for ($i = 0; $i < count($request->colors); $i++) { 
            $color = new Color();
            $color->hexcode = $request->colors[$i];
            $color->product()->associate($product);
            $color->save();
        }

        foreach ($colors as $key => $color) {
            $color->delete();
        }

        for ($i = 0; $i < count($request->dimensions); $i++) { 
            $dimension = new Dimension();
            $dimension->specs = $request->dimensions[$i];
            $dimension->product()->associate($product);
            $dimension->save();
        }

        foreach ($dimensions as $key => $dimension) {
            $dimension->delete();
        }

        if($request->collections)
        {
            $product->collections()->sync($request->collections);
        } else {
            $product->collections()->detach();
        }

        Session::flash('product_created', 'Product created successfully');
        
        return redirect()->action('ProductController@index');
    }



    public function destroy($id) {
        $product = $this->products->getById($id);

        $colors = Color::where('product_id', $id)->get();

        if($colors->imageCount())
        {
            foreach ($colors as $key => $color) {
                $color->delete();
            }
        }

        $dimensions = Dimension::where('product_id', $id)->get();
        
        if($dimensions->imageCount())
        {
            foreach ($dimensions as $key => $dimension) {
                $dimension->delete();
            }
        }

        foreach ($product->faqs as $key => $faq) {
            if($faq->products()->imageCount() === 1)
            {
                $faq->delete();
            }
        }

        $product->faqs()->detach();
        $product->collections()->detach();
        
        foreach ($product->productImages as $key => $image) {
            $image->delete();
        }

        $product->delete();

        Session::flash('product_deleted', 'Product deleted successfully');
        
        return back();
    }
}


