<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;

use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderDetailController extends Controller
{
    public function order_detail($order_number)
    {
        $order = Order::with('order_details.product', 'city')->where('user_id', Auth::user()->id)->where('order_number', $order_number)->firstOrFail();
        return view('user.order.order_detail', compact('order'));
    }

    public function my_return_orders()
    {
        $return_orders = OrderDetail::with('order','product')->has('order')
            ->where('return_reason', '!=', null)->get();
        return view('user.order.my_return_orders',compact('return_orders'));
    }

    public function my_cancelled_orders()
    {
        $cancel_orders = Order::where('status', 'Cancelled')->get();
        return view('user.order.my_cancelled_orders',compact('cancel_orders'));
    }
}
