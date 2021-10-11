<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressCreateRequest;
use App\Http\Requests\AddressUpdateRequest;
use App\Models\Address;
use App\Models\City;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        $cities = City::orderBy('name')->get();
        $addresses = Address::with('city')->get();
        return view('admin.shipping.address.index',compact('addresses','cities'));
    }

    public function create(AddressCreateRequest $request)
    {
        $address = new Address();
        $address->city_id = $request->city_id;
        $address->name = $request->name;
        $address->save();

        $notification = array(
            'message' => 'Ünvan Əlavə Olundu',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function edit(Address $address)
    {
        $cities = City::orderBy('name')->get();
        return view('admin.shipping.address.edit',compact('address','cities'));
    }

    public function update(AddressUpdateRequest $request, Address $address)
    {
        $address->city_id = $request->city_id;
        $address->name = $request->name;
        $address->save();

        $notification = array(
            'message' => 'Ünvan Güncəlləndi',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.address.index')->with($notification);
    }

    public function delete(Address $address)
    {
        $address->delete();

        $notification = array(
            'message' => 'Ünvan Silindi',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.address.index')->with($notification);
    }
}
