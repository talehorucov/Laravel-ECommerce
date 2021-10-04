<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $products = Product::where('status', 1)->get();
        $categories = Category::with('subcategories.subsubcategories', 'products')->orderBy('name')->take(8)->get();
        $sliders = Slider::where('status', 1)->get()->take(3);
        $brands = Brand::with('products')->withCount('products')->orderBy('products_count', 'desc')->limit(5)->get();
        return view('user.index', compact('categories', 'sliders', 'products', 'brands', 'tags'));
    }

    public function subcategory($slug)
    {
        $subcategory = SubCategory::whereSlug($slug)->first();
        $categories = Category::all();
        $products = Product::whereHas('subcategory',function($query) use ($slug){
            $query->where('slug',$slug);
        })->paginate(3);
        return view('user.product.subcategory_index',compact('subcategory','categories','products'));
    } 

    public function subsubcategory($slug)
    {
        $subsubcategory = SubSubCategory::whereSlug($slug)->first();
        $categories = Category::all();
        $products = Product::whereHas('subsubcategory',function($query) use ($slug){
            $query->where('slug',$slug);
        })->paginate(3);
        return view('user.product.subsubcategory_index',compact('subsubcategory','categories','products'));
    } 

    public function product_detail($slug)
    {
        $product = Product::whereSlug($slug)->with('multiProductImg','colors','sizes')->firstOrFail();
        $similar_products = Product::where('category_id',$product->category_id)->where('id','!=',$product->id)->get();
        return view('user.product.details', compact('product','similar_products'));
    }

    public function tags($tag)
    {
        $products = Product::whereHas('tags', function ($query) use ($tag) {
            $query->whereName($tag);
        })->paginate(3);

        $categories = Category::with('subcategories.subsubcategories', 'products')->orderBy('name')->take(8)->get();
        return view('user.tags.index', compact('products', 'categories', 'tag'));
    }
    
    public function ajax_product_modal($id)
    {
        $product = Product::whereid($id)->with('multiProductImg','colors','sizes','category','brand')->firstOrFail();

        return response()->json(array(
            'product' => $product
        ));
    }
}
