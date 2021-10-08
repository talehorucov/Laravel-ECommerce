<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use App\Http\Controllers\Controller;
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

        return view('user.addtocart.index',compact('carts','cart_count','cart_total'));
    }

    public function AddToCart(CartRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->discount_price == null) {
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 0,
                'options' => [
                    'image' => $product->thumbnail,
                    'color' => $request->color,
                    'size' => $request->size
                    ]
            ]);

            if(!session()->has('cart_id')){
                $cart = new ShoppingCart;
                $cart->user_id = Auth::check() ? auth()->user()->id : null;
                $cart->save();
                Session::put('cart_id', $cart->id);
            }

            return response()->json(['success'=> 'Məhsul Səbətə Uğurla Əlavə Edildi']);
        }
        else{
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->thumbnail,
                    'color' => $request->color,
                    'size' => $request->size
                    ]
            ]);
            return response()->json(['success'=> 'Məhsul Səbətə Uğurla Əlavə Edildi']);
        }
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
        return response()->json(['success'=>'Məhsul Səbətdən Silindi']);
    }

    public function Remove($id)
    {
        Cart::remove($id);
        return response()->json(['success'=>'Məhsul Səbətdən Silindi']);
    }
}
