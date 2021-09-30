<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('status',1)->take(6)->get();
        $categories = Category::with('subcategories.subsubcategories','products')->orderBy('name')->take(8)->get();
        $sliders = Slider::where('status',1)->get()->take(3);
        return view('user.index',compact('categories','sliders','products'));
    }

    public function product_detail($slug)
    {
        $product = Product::whereSlug($slug)->with('multiProductImg')->firstOrFail();
        return view('user.product.details',compact('product'));
    }
}
