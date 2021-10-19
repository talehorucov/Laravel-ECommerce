<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Services\AddToCartService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::content();
        $cart_count = Cart::count();
        $cart_total = Cart::total();

        return view('user.addtocart.index', compact('carts', 'cart_count', 'cart_total'));
    }

    public function AddToCart(CartRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        if (!session()->has('cart_id')) {
            $cart = new ShoppingCart;
            $cart->user_id = auth()->id ?? null;
            $cart->save();
            Session::put('cart_id', $cart->id);
        } elseif (session()->has('cart_id')) {
            AddToCartService::AddToCart();
        }
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->quantity,
            'price' => ($product->discount_price == 0 || null) ? $product->selling_price : $product->discount_price,
            'weight' => 0,
            'options' => [
                'image' => $product->thumbnail,
                'color' => $request->color,
                'size' => $request->size
            ]
        ]);
        return response()->json(['success' => 'Məhsul Səbətə Uğurla Əlavə Edildi']);
    }

    public function AddMiniCart()
    {
        $carts = Cart::content();
        $cart_count = Cart::count();
        $cart_total = Cart::total();

        return response()->json([
            'carts' => $carts,
            'cart_count' => $cart_count,
            'cart_total' => round($cart_total),
        ]);
    }

    public function RemoveMiniCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Məhsul Səbətdən Silindi']);
    }

    public function Remove($id)
    {
        Cart::remove($id);
        return response()->json(['success' => 'Məhsul Səbətdən Silindi']);
    }

    public function Apply_Coupon(Request $request)
    {
        $coupon = Coupon::where('name', $request->name)->where('status', 1)->first();
        if ($coupon) {
            Session::put('coupon', [
                'name' => $coupon->name,
                'discount' => $coupon->discount,
                'discount_amount' => round(Cart::total() * $coupon->discount / 100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->discount / 100),
            ]);
            return response()->json(['success' => 'Kupon Əlavə Edildi']);
        }
        return response()->json(['error' => 'Kupon mövcud deyil və ya vaxtı bitmişdir']);
    }

    public function Coupon_Calculate()
    {
        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'name' => session()->get('coupon')['name'],
                'discount' => session()->get('coupon')['discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        }
        return response()->json(array('total' => Cart::total()));
    }

    public function Coupon_Remove()
    {
        Session::forget('coupon');
        return response()->json(['success' => 'Kupon Silindi']);
    }

    public function Coupon_Checkout()
    {
        if (Auth::check()) {
            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cart_count = Cart::count();
                $cart_total = Cart::total();

                return view('user.checkout.index', compact('carts', 'cart_count', 'cart_total'));
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
