<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\AdminBrandCreateRequest;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.index', compact('brands'));
    }

    public function create(AdminBrandCreateRequest $request)
    {
        $image = $request->file('image');
        $image_name = $request->name . '.' . $image->getClientOriginalExtension();
        @unlink('upload/brands/' . $request->name);
        Image::make($image)->resize(300, 300)->save('upload/brands/' . $image_name);
        $image_url = 'upload/brands/' . $image_name;

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->image = $image_url;
        $brand->save();

        $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        if ($request->image) {
            $image = $request->file('image');
            $image_name = $request->name . '.' . $image->getClientOriginalExtension();
            @unlink('upload/brands/' . $request->name);
            Image::make($image)->resize(300, 300)->save('upload/brands/' . $image_name);
            $image_url = 'upload/brands/' . $image_name;

            $brand->image = $image_url;
        }

        $brand->name = $request->name;
        $brand->save();

        $notification = array(
            'message' => 'Brand Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.brands')->with($notification);
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        unlink($brand->image);
        $brand->delete();

        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.brands')->with($notification);
    }
}
