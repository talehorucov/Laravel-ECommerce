<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('status',1)->get();
        $categories = Category::with('subcategories.subsubcategories','products')->orderBy('name')->take(8)->get();
        $sliders = Slider::where('status',1)->get()->take(3);
        $brands = Brand::with('products')->withCount('products')->orderBy('products_count', 'desc')->limit(5)->get();
        return view('user.index',compact('categories','sliders','products','brands'));
    }

    public function product_detail($slug)
    {
        $product = Product::whereSlug($slug)->with('multiProductImg')->firstOrFail();
        return view('user.product.details',compact('product'));
    }

    public function tags($tag)
    {
        $products = Product::where('status',1)->where('tags',$tag)->paginate(3);
        $categories = Category::with('subcategories.subsubcategories','products')->orderBy('name')->take(8)->get();
        return view('user.tags.index',compact('products','categories'));
    }
}
