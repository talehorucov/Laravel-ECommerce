<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Models\MultiProductImg;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\AdminProductCreateRequest;
use App\Http\Requests\AdminProductUpdateRequest;

class ProductController extends Controller
{
    public function add()
    {
        $categories = Category::orderBy('name_eng')->get();
        $brands = Brand::orderBy('name')->get();
        return view('admin.product.add', compact('categories', 'brands'));
    }

    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.product.index', compact('products'));
    }

    public function create(AdminProductCreateRequest $request)
    {
        Brand::findOrFail($request->brand_id);
        Category::findOrFail($request->category_id);
        SubCategory::findOrFail($request->subcategory_id);
        SubSubCategory::findOrFail($request->subsubcategory_id);

        $image = $request->file('thumbnail');
        $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnail/' . $image_name);
        $image_url = 'upload/products/thumbnail/' . $image_name;

        $product = new Product();
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subsubcategory_id = $request->subsubcategory_id;
        $product->name_eng = $request->name_eng;
        $product->name_aze = $request->name_aze;
        $product->code = $request->code;
        $product->quantity = $request->quantity;
        $product->tags_eng = $request->tags_eng;
        $product->tags_aze = $request->tags_aze;
        $product->size_eng = $request->size_eng;
        $product->size_aze = $request->size_aze;
        $product->color_eng = $request->color_eng;
        $product->color_aze = $request->color_aze;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->short_desc_eng = $request->short_desc_eng;
        $product->short_desc_aze = $request->short_desc_aze;
        $product->long_desc_eng = $request->long_desc_eng;
        $product->long_desc_aze = $request->long_desc_aze;
        $product->thumbnail = $image_url;
        $product->hot_deals = $request->hot_deals;
        $product->featured = $request->featured;
        $product->special_offer = $request->special_offer;
        $product->special_deal = $request->special_deal;
        $product->status = 1;
        $product->save();
        $product_id = $product->id;


        ///////////////// Multi Images Create ////////////////////

        $images = $request->file('multi_img');
        foreach ($images as $image) {
            $make_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/products/images/' . $make_name);
            $upload_img = 'upload/products/images/' . $make_name;

            $product_img = new MultiProductImg();
            $product_img->product_id = $product_id;
            $product_img->name = $upload_img;
            $product_img->save();
        };

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.product.index')->with($notification);
    }

    public function edit(Product $product)
    {
        Brand::findOrFail($product->brand_id);
        Category::findOrFail($product->category_id);
        SubCategory::findOrFail($product->subcategory_id);
        SubSubCategory::findOrFail($product->subcategory_id);

        $multi_images = MultiProductImg::where('product_id', $product->id)->get();
        $brands = Brand::orderBy('name')->get();
        $categories = Category::orderBy('name_eng')->get();
        $subcategories = SubCategory::orderBy('name_eng')->get();
        $subsubcategories = SubSubCategory::orderBy('name_eng')->get();

        return view('admin.product.edit', compact('product', 'brands', 'categories', 'subcategories', 'subsubcategories', 'multi_images'));
    }

    public function detail($slug)
    {
        $product = Product::where('slug_eng', $slug)->with('brand', 'category', 'subcategory', 'subsubcategory', 'multiProductImg')->first();
        return view('admin.product.detail', compact('product'));
    }

    public function update(AdminProductUpdateRequest $request, Product $product)
    {
        Brand::findOrFail($request->brand_id);
        Category::findOrFail($request->category_id);
        SubCategory::findOrFail($request->subcategory_id);
        SubSubCategory::findOrFail($request->subsubcategory_id);

        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subsubcategory_id = $request->subsubcategory_id;
        $product->name_eng = $request->name_eng;
        $product->name_aze = $request->name_aze;
        $product->code = $request->code;
        $product->quantity = $request->quantity;
        $product->tags_eng = $request->tags_eng;
        $product->tags_aze = $request->tags_aze;
        $product->size_eng = $request->size_eng;
        $product->size_aze = $request->size_aze;
        $product->color_eng = $request->color_eng;
        $product->color_aze = $request->color_aze;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->short_desc_eng = $request->short_desc_eng;
        $product->short_desc_aze = $request->short_desc_aze;
        $product->long_desc_eng = $request->long_desc_eng;
        $product->long_desc_aze = $request->long_desc_aze;
        // $product->thumbnail = $image_url;
        $product->hot_deals = $request->hot_deals;
        $product->featured = $request->featured;
        $product->special_offer = $request->special_offer;
        $product->special_deal = $request->special_deal;
        $product->status = 1;
        $product->save();
        $product_id = $product->id;

        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.product.index')->with($notification);
    }

    public function delete(Product $product)
    {
        unlink($product->thumbnail);
        $product->delete();

        $images = MultiProductImg::where('product_id',$product->id)->get();
        foreach ($images as $image) {
            unlink($image->name);
            $image->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.product.index')->with($notification);
    }

    public function update_images(Request $request)
    {
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiProductImg::findOrFail($id);
            unlink($imgDel->name);

            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/images/' . $make_name);
            $uploadPath = 'upload/products/images/' . $make_name;

            MultiProductImg::where('id', $id)->update([
                'name' => $uploadPath,
                'updated_at' => Carbon::now(),

            ]);
        } // end foreach

        $notification = array(
            'message' => 'Product Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function delete_images(MultiProductImg $multi_images)
    {
        unlink($multi_images->name);
        $multi_images->delete();

        $notification = array(
            'message' => 'Product Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function update_thumbnail(Request $request, $id)
    {
        if ($request->file('thumbnail')) {
            $old_image = $request->old_image;
            unlink($old_image);

            $image = $request->file('thumbnail');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/products/thumbnail/' . $image_name);
            $image_url = 'upload/products/thumbnail/' . $image_name;

            $product = Product::findOrFail($id);
            $product->thumbnail = $image_url;
            $product->save();

            $notification = array(
                'message' => 'Product Thumbnail Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }

        return redirect()->back();
    }

    public function product_active(Product $product)
    {
        $product->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Activated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function product_inactive(Product $product)
    {
        $product->update(['status' => 0]);
        $notification = array(
            'message' => 'Product InActivated Successfully',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}
