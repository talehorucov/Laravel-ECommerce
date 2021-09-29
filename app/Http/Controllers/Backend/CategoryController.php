<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCategoryCreateRequest;
use App\Http\Requests\AdminCategoryUpdateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories'));
    }

    public function create(AdminCategoryCreateRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->icon = $request->icon;
        $category->save();

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function edit($slug)
    {
        $category = Category::whereSlug($slug)->first();
        return view('admin.category.edit', compact('category'));
    }

    public function update(AdminCategoryUpdateRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->icon = $request->icon;
        $category->save();

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.category.index')->with($notification);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
