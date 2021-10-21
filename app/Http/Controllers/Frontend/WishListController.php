<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function Add($id)
    {
        $exist = Wishlist::where('user_id', Auth()->user()->id)->where('product_id', $id)->firstOrFail();

        if (!$exist) {
            $wishlist = new Wishlist();
            $wishlist->user_id = Auth()->user()->id;
            $wishlist->product_id = $id;
            $wishlist->save();
            return response()->json(['success' => 'Məhsul İstək Siyahınıza Əlavə Edildi']);
        }
        return response()->json(['danger' => 'Məhsul Artıq İstək Siyahınızda Var']);
    }

    public function index()
    {
        $wishlists = Wishlist::with('product')->where('user_id', Auth()->user()->id)->get();
        return view('user.wishlist.index', compact('wishlists'));
    }

    public function remove($id)
    {
        Wishlist::where('user_id', Auth::user()->id)->where('product_id', $id)->delete();
        return response()->json(['success' => 'Məhsul İstək Siyahınızdan Silindi']);
    }
}
