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
                                    <td class="col-md-2">
                                        <label>Məbləğ</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label>Sifariş</label>
                                    </td>
                                </tr>
                                @foreach ($cancel_orders as $order)
                                    <tr>
                                        <td class="col-md-2">
                                            <label>{{ $order->cancel_date }}</label>
                                        </td>
                                        <td class="col-md-1">
                                            <label>{{ $order->order_number }}</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label>{{ $order->discount_amount ?? $order->order->amount }} Azn
                                            </label>
                                        </td>
                                        <td class="col-md-2">
                                            <a href="{{ route('my_order.detail', $order->order_number) }}"
                                                class="btn btn-primary"><i class="fa fa-eye"></i></a>
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
