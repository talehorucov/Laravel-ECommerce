<?php

namespace App\Services;

use App\Models\CartProduct;
use App\Models\ShoppingCart;
use Gloudemans\Shoppingcart\Facades\Cart;

class AddToCartService
{
    public static function AddToCart()
    {
        $active_cart = ShoppingCart::create([
            'user_id' => auth()->id() ?? null
        ]);

        $cart_id = $active_cart->id;
        session()->put('cart_id', $cart_id);

        if (Cart::count() > 0) {
            foreach (Cart::content() as $cart) {
                CartProduct::updateOrCreate(
                    ['cart_id' => $cart_id, 'product_id' => $cart->id, 'size' => $cart->options->size],
                    ['quantity' => $cart->qty, 'price' => $cart->price],
                );
            }
        }

        Cart::destroy();

        $cart_products = CartProduct::with('products')->where('cart_id', $cart_id)->get();

        foreach ($cart_products as $cp) {
            Cart::add(
                [
                    'id' => $cp->product->id,
                    'name' => $cp->product->name,
                    'quantity' => $cp->quantity,
                    'price' => $cp->product->discount_price ?? $cp->product->selling_price,
                    'weight' => 0,
                    'options' => [
                        'image' => $cp->product->thumbnail,
                        'color' => $cp->product->color,
                        'size' => $cp->product->size
                    ]
                ]
            );
        }
        return response()->json(['success' => 'Məhsul Səbətə Uğurla Əlavə Edildi']);
    }
}
