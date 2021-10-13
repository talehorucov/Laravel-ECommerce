<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cart_count = Cart::count();
                $cart_total = Cart::total();

                return view('user.checkout.index',compact('carts','cart_count','cart_total'));
            } else {
                $notification = [
                    'message' => 'Səbətiniz boşdur',
                    'alert-type' => 'error'
                ];
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = [
                'message' => 'Giriş Etməlisiniz',
                'alert-type' => 'error'
            ];
            return redirect()->route('login')->with($notification);
        }
    }
}
