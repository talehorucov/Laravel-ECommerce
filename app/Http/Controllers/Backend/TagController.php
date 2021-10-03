<?php

namespace App\Http\Controllers\Backend;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminTagCreateRequest;
use App\Http\Requests\AdminTagUpdateRequest;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag.index',compact('tags'));
    }

    public function create(AdminTagCreateRequest $request)
    {
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();

        $notification = array(
            'message' => 'Tag Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(AdminTagUpdateRequest $request, Tag $tag)
    {
        $tag->name = $request->name;
        $tag->save();

        $notification = array(
            'message' => 'Tag Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.tag.index')->with($notification);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        $notification = array(
            'message' => 'Tag Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
