<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminSubCategoryCreateRequest;
use App\Http\Requests\AdminSubCategoryUpdateRequest;
use App\Http\Requests\AdminSubSubCategoryCreateRequest;
use App\Http\Requests\AdminSubSubCategoryUpdateRequest;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name_eng')->get();
        $subcategories = SubCategory::latest()->get();
        return view('admin.category.subcategory_index',compact('subcategories','categories'));
    }

    public function create(AdminSubCategoryCreateRequest $request)
    {
        Category::findOrFail($request->category_id);
        $subcategory = new SubCategory();
        $subcategory->name_eng = $request->name_eng;
        $subcategory->name_aze = $request->name_aze;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.subcategories')->with($notification);
    }

    public function edit($id)
    {        
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::orderBy('name_eng')->get();
        return view('admin.category.subcategory_edit',compact('subcategory', 'categories'));
    }

    public function update(AdminSubCategoryUpdateRequest $request, $id)
    {
        Category::findOrFail($request->category_id);
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->name_eng = $request->name_eng;
        $subcategory->name_aze = $request->name_aze;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.subcategories')->with($notification);
    }

    public function destroy($id)
    {
        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    ////////////////////////////// SUB SUBCATEGORY ////////////////////////

    public function sub_index()
    {
        $categories = Category::orderBy('name_eng')->get();
        $subcategories = SubCategory::orderBy('name_eng')->get();
        $subsubcategories = SubSubCategory::latest()->get();
        return view('admin.category.sub_subcategory_index',compact('categories','subcategories','subsubcategories'));
    }

    public function get_subcategory($category_id)
    {
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('name_eng')->get();
        if ($subcat) {
            return json_encode($subcat);
        }
        return redirect()->back();
    }

    public function sub_create(AdminSubSubCategoryCreateRequest $request)
    {
        Category::findOrFail($request->category_id);
        SubCategory::findOrFail($request->subcategory_id);
        $subsubcategory = new SubSubCategory();
        $subsubcategory->name_eng = $request->name_eng;
        $subsubcategory->name_aze = $request->name_aze;
        $subsubcategory->category_id = $request->category_id;
        $subsubcategory->subcategory_id = $request->subcategory_id;
        $subsubcategory->save();

        $notification = array(
            'message' => 'Sub->SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.subsubcategories')->with($notification);
    }

    public function sub_edit($id)
    {        
        $subsubcategory = SubSubCategory::findOrFail($id);
        $categories = Category::orderBy('name_eng')->get();
        $subcategories = SubCategory::orderBy('name_eng')->get();
        return view('admin.category.sub_subcategory_edit',compact('subsubcategory','subcategories', 'categories'));
    }

    public function sub_update(AdminSubSubCategoryUpdateRequest $request ,$id)
    {        
        Category::findOrFail($request->category_id);
        SubCategory::findOrFail($request->subcategory_id);
        $subsubcategory = SubSubCategory::findOrFail($id);
        $subsubcategory->name_eng = $request->name_eng;
        $subsubcategory->name_aze = $request->name_aze;
        $subsubcategory->category_id = $request->category_id;
        $subsubcategory->subcategory_id = $request->subcategory_id;
        $subsubcategory->save();

        $notification = array(
            'message' => 'Sub->SubCategory Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.subsubcategories')->with($notification);
    }

    public function sub_destroy($id)
    {
        SubSubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Sub->SubCategory Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function get_subsubcategory($subcategory_id)
    {
        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('name_eng')->get();
        if ($subsubcat) {
            return json_encode($subsubcat);
        }
        return redirect()->back();
    }
}
