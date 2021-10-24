<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Tag;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Services\AddToCartService;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $products = Product::where('status', 1)->get();
        $categories = Category::with('subcategories.subsubcategories', 'products')->orderBy('name')->take(8)->get();
        $sliders = Slider::where('status', 1)->get()->take(3);
        $brands = Brand::with('products')->withCount('products')->orderBy('products_count', 'desc')->limit(5)->get();
        $most_sale = Product::withCount('orders')->orderByDesc('orders_count')->get();
        return view('user.index', compact('categories', 'sliders', 'products', 'brands', 'tags','most_sale'));
    }

    public function subcategory($slug)
    {
        $subcategory = SubCategory::whereSlug($slug)->first();
        $categories = Category::all();
        $products = Product::whereHas('subcategory', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->paginate(3);
        return view('user.product.subcategory_index', compact('subcategory', 'categories', 'products'));
    }

    public function subsubcategory($slug)
    {
        $subsubcategory = SubSubCategory::whereSlug($slug)->first();
        $categories = Category::all();
        $products = Product::whereHas('subsubcategory', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->paginate(3);
        return view('user.product.subsubcategory_index', compact('subsubcategory', 'categories', 'products'));
    }

    public function product_detail($slug)
    {
        $product = Product::whereSlug($slug)->with('multiProductImg', 'colors', 'sizes', 'tags')->firstOrFail();
        $similar_products = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
        return view('user.product.details', compact('product', 'similar_products'));
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
        $product = Product::with('multiProductImg', 'colors', 'sizes', 'category', 'brand')->findOrFail($id);

        return response()->json(array(
            'product' => $product
        ));
    }

    public function search(Request $request)
    {
        $name = $request->search;
        $products = Product::where('name', 'LIKE', "%$name%")->paginate(10);
        $categories = Category::all();
        return view('user.product.search', compact('products', 'categories'));
    }
}
