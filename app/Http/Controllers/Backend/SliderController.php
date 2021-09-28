<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminSliderCreateRequest;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create(AdminSliderCreateRequest $request)
    {
        $image = $request->file('image');
        $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('upload/sliders/' . $image_name);
        $img_url = 'upload/sliders/' . $image_name;

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->image = $img_url;
        $slider->save();

        $notification = array(
            'message' => 'Slider Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit',compact('slider'));
    }

    public function update(AdminSliderCreateRequest $request, Slider $slider)
    {
        if ($request->file('image')) {
            $image = $request->file('image');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            unlink($slider->image);
            Image::make($image)->resize(870, 370)->save('upload/sliders/' . $image_name);
            $img_url = 'upload/sliders/' . $image_name;
    
            $slider->image = $img_url;
        }
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->save();

        $notification = array(
            'message' => 'Slider Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.slider.index')->with($notification);
    }

    public function delete(Slider $slider)
    {
        unlink($slider->image);
        $slider->delete();

        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.slider.index')->with($notification);
    }

    public function slider_active(Slider $slider)
    {
        $slider->update(['status' => 1]);
        $notification = array(
            'message' => 'Slider Activated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function slider_inactive(Slider $slider)
    {
        $slider->update(['status' => 0]);
        $notification = array(
            'message' => 'Slider InActivated Successfully',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}
