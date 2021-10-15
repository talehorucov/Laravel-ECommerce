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
                                    <td class="col-md-2">
                                        <label>Tarix</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label>Sifariş №</label>
                                    </td>
                                    <td class="col-md-3">
                                        <label>Kupon</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label>Endirim</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label>Məbləğ</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label>Status</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label>Məlumat</label>
                                    </td>
                                </tr>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="col-md-2">
                                            <label>{{ Carbon\Carbon::createFromTimeString($order->created_at)->toFormattedDateString() }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label>{{ $order->order_number }}</label>
                                        </td>
                                        <td class="col-md-3">
                                            @if ($order->coupon)
                                                <label><span class="badge badge-pill badge-warning"
                                                        style="background:red">{{ $order->coupon }}</span></label>
                                            @else
                                                <label><span class="badge badge-pill badge-warning"
                                                        style="background:red">Qeyd Edilməyib</span></label>
                                            @endif
                                        </td>
                                        <td class="col-md-1">
                                            @if ($order->discount)
                                                <label><span class="badge badge-pill badge-warning"
                                                        style="background:red">{{ $order->discount }}</span></label>
                                            @else
                                                <label><span class="badge badge-pill badge-warning"
                                                        style="background:red">Qeyd Edilməyib</span></label>
                                            @endif
                                        </td>
                                        <td class="col-md-2">
                                            <label>{{ $order->discount_amount }} Azn
                                            </label>
                                        </td>
                                        <td class="col-md-2">
                                            <label>
                                                <span class="badge badge-pill badge-warning"
                                                    style="background:#418DB9">{{ $order->status }}</span>
                                            </label>
                                        </td>
                                        <td class="col-md-1">
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
