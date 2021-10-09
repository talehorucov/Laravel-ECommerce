<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponCreateRequest;
use App\Http\Requests\CouponUpdateRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.coupon.index', compact('coupons'));
    }

    public function create(CouponCreateRequest $request)
    {
        $coupon = new Coupon();
        $coupon->name = strtoupper($request->name);
        $coupon->discount = $request->discount;
        $coupon->validity = $request->validity;
        $coupon->save();

        $notification = array(
            'message' => 'Kupon Əlavə Olundu',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function edit(Coupon $coupon)
    {
        return view('admin.coupon.edit',compact('coupon'));
    }

    public function update(CouponUpdateRequest $request, Coupon $coupon)
    {
        $coupon->name = strtoupper($request->name);
        $coupon->discount = $request->discount;
        $coupon->validity = $request->validity;
        $coupon->save();

        $notification = array(
            'message' => 'Kupon Güncəlləndi',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.coupon.index')->with($notification);
    }
    
    public function delete(Coupon $coupon)
    {
        $coupon->delete();
        
        $notification = array(
            'message' => 'Kupon Silindi',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.coupon.index')->with($notification);
    }

    public function coupon_active(Coupon $coupon)
    {
        $coupon->status = 1;
        $coupon->save();

        $notification = array(
            'message' => 'Kupon Aktivləşdirildi',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function coupon_inactive(Coupon $coupon)
    {
        $coupon->status = 0;
        $coupon->save();

        $notification = array(
            'message' => 'Kupon Deaktivləşdirildi',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
