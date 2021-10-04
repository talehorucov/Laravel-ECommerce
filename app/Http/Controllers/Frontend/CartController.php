<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function AddToCart(CartRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->discount_price == null) {
            Cart::add([
                'id' => $product->id, 
                'name' => $product->name, 
                'qty' => $request->quantity, 
                'price' => $product->selling_price, 
                'weight' => 1, 
                'options' => [
                    'image' => $product->thumbnail,
                    'color' => $request->color,
                    'size' => $request->size
                    ]
            ]);
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
}
