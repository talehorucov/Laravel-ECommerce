<?php

namespace App\Http\Controllers\Frontend;

use session;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OrderCreateRequest;
use App\Http\Requests\OrderReturnRequest;
use App\Models\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    public function index(OrderCreateRequest $request)
    {
        $old = Order::orderByDesc('id')->first();
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->city_id = $request->city_id;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->post_code = $request->post_code;
        $order->note = $request->note;
        if ($old) {
            $order->order_number = (string)('00000000' . $old->order_number + 1);
        }
        if (session('coupon')) {
            $order->coupon = session('coupon')['name'];
            $order->discount = session('coupon')['discount'] . '%';
            $order->discount_amount = session('coupon')['total_amount'];
        }
        $order->amount = Cart::total();
        $order->status = 'Pending';
        $order->save();
        $order_id = $order->id;

        foreach (Cart::content() as $product) {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order_id;
            $orderDetail->product_id = $product->id;
            $orderDetail->color = $product->options->color;
            $orderDetail->size = $product->options->size;
            $orderDetail->quantity = $product->qty;
            $orderDetail->price = $product->price;
            $orderDetail->save();

            $_product = Product::findOrFail($product->id);
            $_product->quantity = $_product->quantity - $product->qty;
            $_product->save();
        }
        session()->forget('coupon');
        Cart::destroy();

        $notification = [
            'message' => 'Sifarişiniz Uğurla Tamamlandı',
            'alert-type' => 'success'
        ];
        return redirect()->route('index')->with($notification);
    }

    public function my_orders()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('user.order.my_order', compact('orders'));
    }

    public function return_order(Request $request, OrderDetail $orderDetail)
    {
        if (!$request->return_reason) {
            $notification = [
                'message' => 'İadə Səbəbini Qeyd Edin !',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
        $orderDetail->return_reason = $request->return_reason;
        $orderDetail->return_date = Carbon::now();
        $orderDetail->save();

        $notification = [
            'message' => 'İadə tələbiniz uğurla göndərildi',
            'alert-type' => 'success'
        ];
        return redirect()->route('my.orders')->with($notification);
    }

    public function cancel_order(Order $order)
    {
        $order->status = 'Cancelled';
        $order->cancel_date = Carbon::now();
        $order->save();

        $notification = [
            'message' => 'Sifarişiniz uğurla ləğv edildi',
            'alert-type' => 'success'
        ];
        return redirect()->route('my.orders')->with($notification);
    }
}
