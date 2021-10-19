@extends('user.main_master')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('user.common.user_sidebar')

                <div class="col-md-10">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr style="background: #e2e2e2">
                                    <td>
                                        <label>Tarix</label>
                                    </td>
                                    <td>
                                        <label>Sifariş №</label>
                                    </td>
                                    <td>
                                        <label>Kupon</label>
                                    </td>
                                    <td>
                                        <label>Məbləğ</label>
                                    </td>
                                    <td>
                                        <label>Status</label>
                                    </td>
                                    <td>
                                        <label>Ləğv Et</label>
                                    </td>
                                    <td>
                                        <label>Məlumat</label>
                                    </td>
                                </tr>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>
                                            <label>{{ Carbon\Carbon::createFromTimeString($order->created_at)->toFormattedDateString() }}</label>
                                        </td>
                                        <td>
                                            <label>{{ $order->order_number }}</label>
                                        </td>
                                        <td>
                                            @if ($order->coupon)
                                                <label><span class="badge badge-pill badge-warning"
                                                        style="background:red">{{ $order->coupon }}</span></label>
                                            @else
                                                <label><span class="badge badge-pill badge-warning"
                                                        style="background:red">Qeyd Edilməyib</span></label>
                                            @endif
                                        </td>
                                        <td>
                                            <label>{{ $order->discount_amount ?? $order->amount }} Azn
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                @if ($order->status == 'Cancelled')
                                                    <span class="badge badge-pill badge-warning"
                                                        style="background:red">{{ $order->status }}</span>
                                                @else
                                                    <span class="badge badge-pill badge-warning"
                                                        style="background:#418DB9">{{ $order->status }}</span>
                                                @endif
                                            </label>
                                        </td>
                                        <td>
                                            <a href="{{ route('cancel.order', $order) }}"
                                                class="btn btn-danger btn-block"><i class="bi bi-cart-x"
                                                    style="font-size: 15px"></i></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('my_order.detail', $order->order_number) }}"
                                                class="btn btn-primary btn-block"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
