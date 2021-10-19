<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function pending_orders()
    {
        $orders = Order::where('status','Pending')->orderByDesc('id')->get();
        return view('admin.order.pending.index',compact('orders'));
    }

    public function order_details($order_number)
    {
        $order = Order::with('order_details.product','city')->where('order_number', $order_number)->firstOrFail();
        return view('admin.order.detail', compact('order'));
    }

    public function confirmed_orders()
    {
        $orders = Order::where('status','Confirmed')->orderByDesc('id')->get();
        return view('admin.order.confirm.index',compact('orders'));
    }

    public function processing_orders()
    {
        $orders = Order::where('status','Processing')->orderByDesc('id')->get();
        return view('admin.order.processing.index',compact('orders'));
    }

    public function picked_orders()
    {
        $orders = Order::where('status','Picked')->orderByDesc('id')->get();
        return view('admin.order.picked.index',compact('orders'));
    }

    public function shipped_orders()
    {
        $orders = Order::where('status','Shipped')->orderByDesc('id')->get();
        return view('admin.order.shipped.index',compact('orders'));
    }

    public function delivered_orders()
    {
        $orders = Order::where('status','Delivered')->orderByDesc('id')->get();
        return view('admin.order.delivered.index',compact('orders'));
    }

    public function cancel_orders()
    {
        $orders = Order::where('status','Cancel')->orderByDesc('id')->get();
        return view('admin.order.cancel.index',compact('orders'));
    }

    public function pending_to_confirm($order_number)
    {
        $order = Order::where('order_number',$order_number)->firstOrFail();
        $order->status = 'Confirmed';
        $order->confirmed_date = Carbon::now();
        $order->save();

        $notification = array(
            'message' => 'Sifariş Təsdiq Olundu',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.pending.order')->with($notification);
    }

    public function confirm_to_processing($order_number)
    {
        $order = Order::where('order_number',$order_number)->firstOrFail();
        $order->status = 'Processing';
        $order->processing_date = Carbon::now();
        $order->save();

        $notification = array(
            'message' => 'Sifariş Hazırlanır',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.confirmed.order')->with($notification);
    }

    public function processing_to_picked($order_number)
    {
        $order = Order::where('order_number',$order_number)->firstOrFail();
        $order->status = 'Picked';
        $order->picked_date = Carbon::now();
        $order->save();

        $notification = array(
            'message' => 'Sifariş Hazırlandı',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.processing.order')->with($notification);
    }

    public function picked_to_shipped($order_number)
    {
        $order = Order::where('order_number',$order_number)->firstOrFail();
        $order->status = 'Shipped';
        $order->shipped_date = Carbon::now();
        $order->save();

        $notification = array(
            'message' => 'Sifariş Kargoya Verildi',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.picked.order')->with($notification);
    }

    public function shipped_to_delivered($order_number)
    {
        $order = Order::where('order_number',$order_number)->firstOrFail();
        $order->status = 'Delivered';
        $order->delivered_date = Carbon::now();
        $order->save();

        $notification = array(
            'message' => 'Sifariş Təhvil Verildi',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.shipped.order')->with($notification);
    }
}
