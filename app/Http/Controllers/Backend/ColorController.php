<?php

namespace App\Http\Controllers\Backend;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminColorCreateRequest;
use App\Http\Requests\AdminColorUpdateRequest;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.color.index',compact('colors'));
    }

    public function create(AdminColorCreateRequest $request)
    {
        $color = new Color();
        $color->name = $request->name;
        $color->save();

        $notification = array(
            'message' => 'Color Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function edit(Color $color)
    {
        return view('admin.color.edit', compact('color'));
    }

    public function update(AdminColorUpdateRequest $request, Color $color)
    {
        $color->name = $request->name;
        $color->save();

        $notification = array(
            'message' => 'Color Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.color.index')->with($notification);
    }

    public function destroy(Color $color)
    {
        $color->delete();

        $notification = array(
            'message' => 'Color Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
