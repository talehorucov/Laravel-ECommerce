<?php

namespace App\Http\Controllers\Backend;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CityCreateRequest;
use App\Http\Requests\CityUpdateRequest;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('admin.city.index',compact('cities'));
    }

    public function create(CityCreateRequest $request)
    {
        $city = new City();
        $city->name = $request->name;
        $city->save();

        $notification = array(
            'message' => 'Şəhər Əlavə Olundu',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function edit(City $city)
    {
        return view('admin.city.edit',compact('city'));
    }

    public function update(CityUpdateRequest $request, City $city)
    {
        $city->name = $request->name;
        $city->save();

        $notification = array(
            'message' => 'Şəhər Güncəlləndi',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.city.index')->with($notification);
    }

    public function delete(City $city)
    {
        $city->delete();

        $notification = array(
            'message' => 'Şəhər Silindi',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.city.index')->with($notification);
    }
}
