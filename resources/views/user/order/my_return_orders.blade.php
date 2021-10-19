@extends('user.main_master')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('user.common.user_sidebar')
                <div class="col-md-1">
                </div>
                <div class="col-md-9">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr style="background: #e2e2e2">
                                    <td class="col-md-2">
                                        <label>Tarix</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label>Sifariş №</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label>Şəkil</label>
                                    </td>
                                    <td class="col-md-3">
                                        <label>İadə Səbəbi</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label>Məbləğ</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label>Məhsul</label>
                                    </td>
                                </tr>
                                @foreach ($return_orders as $r_order)
                                    <tr>
                                        <td class="col-md-2">
                                            <label>{{ $r_order->return_date }}</label>
                                        </td>
                                        <td class="col-md-1">
                                            <label>{{ $r_order->order->order_number }}</label>
                                        </td>
                                        <td class="col-md-1">
                                            <img src="{{ asset($r_order->product->thumbnail) }}"
                                                style="width: 70px;height:70">
                                        </td>
                                        <td class="col-md-3">
                                            <label>{{ $r_order->return_reason }}
                                            </label>
                                        </td>
                                        <td class="col-md-2">
                                            <label>{{ $r_order->order->discount_amount ?? $r_order->order->amount }} Azn
                                            </label>
                                        </td>
                                        <td class="col-md-1">
                                            <a href="{{ route('user.product.detail', $r_order->product->slug) }}"
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
