<?php

namespace App\Http\Controllers\Backend;

use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminSizeCreateRequest;
use App\Http\Requests\AdminSizeUpdateRequest;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::all();
        return view('admin.size.index',compact('sizes'));
    }

    public function create(AdminSizeCreateRequest $request)
    {
        $size = new Size();
        $size->name = $request->name;
        $size->save();

        $notification = array(
            'message' => 'Size Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function edit(Size $size)
    {
        return view('admin.size.edit', compact('size'));
    }

    public function update(AdminSizeUpdateRequest $request, Size $size)
    {
        $size->name = $request->name;
        $size->save();

        $notification = array(
            'message' => 'Size Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.size.index')->with($notification);
    }

    public function destroy(Size $size)
    {
        $size->delete();

        $notification = array(
            'message' => 'Size Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
