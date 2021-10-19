@extends('user.main_master')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('user.common.user_sidebar')
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h4><b>Sifariş Haqqında Geniş Məlumat</b></h4>
                        </div>
                        <hr>
                        <div class="card-body" style="background: #E9EBEC">
                            <table class="table">
                                <tr>
                                    <th>Sifariş №:</th>
                                    <th>{{ $order->order_number }}</th>
                                </tr>
                                <tr>
                                    <th>Təhvil Veriləcək Şəxs:</th>
                                    <th>{{ $order->name }}</th>
                                </tr>
                                <tr>
                                    <th>Ünvan:</th>
                                    <th>{{ $order->address }}</th>
                                </tr>
                                <tr>
                                    <th>Telefon:</th>
                                    <th>{{ $order->phone }}</th>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <th>{{ $order->email }}</th>
                                </tr>
                                <tr>
                                    <th>Kupon:</th>
                                    <th>
                                        @if ($order->coupon)
                                            <span class="badge badge-pill badge-warning"
                                                style="background:red">{{ $order->coupon }}</span>
                                        @else
                                            <span class="badge badge-pill badge-warning" style="background:red">Yoxdur</span>
                                        @endif
                                    </th>
                                </tr>
                                <tr>
                                    <th>Endirim Miqdarı:</th>
                                    <th>
                                        @if ($order->discount)
                                            <span class="badge badge-pill badge-warning"
                                                style="background:red">{{ $order->discount }}</span>
                                        @else
                                            <span class="badge badge-pill badge-warning"
                                                style="background:red">Yoxdur</span>
                                        @endif
                                    </th>
                                </tr>
                                <tr>
                                    <th>Poçt:</th>
                                    <th>
                                        @if ($order->post_code)
                                            {{ $order->post_code }}
                                        @else
                                            <span class="badge badge-pill badge-warning" style="background:red">
                                                Qeyd Edilməyib</span>
                                        @endif

                                    </th>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <th>
                                        <span class="badge badge-pill badge-warning"
                                            style="background:#418DB9">{{ $order->status }}
                                        </span>
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr style="background: #e2e2e2">
                                        <td class="col-md-2">
                                            <label>Şəkil</label>
                                        </td>
                                        <td class="col-md-3">
                                            <label>Məhsulun Adı</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label>Məhsulun Kodu</label>
                                        </td>
                                        <td class="col-md-1">
                                            <label>Rəng</label>
                                        </td>
                                        <td class="col-md-1">
                                            <label>Ölçü</label>
                                        </td>
                                        <td class="col-md-1">
                                            <label>Miqdar</label>
                                        </td>
                                        <td class="col-md-1">
                                            <label>Qiymət</label>
                                        </td>
                                        <td class="col-md-1">
                                            <label>İadə</label>
                                        </td>
                                    </tr>
                                    @foreach ($order->order_details as $order_detail)
                                        <tr>
                                            <td class="col-md-2">
                                                <label><img src="{{ asset($order_detail->product->thumbnail) }}"
                                                        style="height:70px;width:70px"></label>
                                            </td>
                                            <td class="col-md-3">
                                                <label>{{ $order_detail->product->name }}</label>
                                            </td>
                                            <td class="col-md-2">
                                                <label>{{ $order_detail->product->code }}</label>
                                            </td>
                                            <td class="col-md-1">
                                                <label>{{ $order_detail->color }}</label>
                                            </td>
                                            <td class="col-md-1">
                                                <label>
                                                    @if ($order_detail->size)
                                                        <span class="badge badge-pill badge-warning"
                                                            style="background:red">{{ $order_detail->size }}</span>
                                                    @else
                                                        <span class="badge badge-pill badge-warning"
                                                            style="background:red">Yoxdur</span>
                                                    @endif
                                                </label>
                                            </td>
                                            <td class="col-md-1">
                                                <label>{{ $order_detail->quantity }}</label>
                                            </td>
                                            <td class="col-md-1">
                                                <label>{{ $order_detail->price }} Azn</label>
                                            </td>
                                            <td class="col-md-1">
                                                @if ($order->status == 'Delivered' and $order_detail->return_reason != null)
                                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                                        data-target="#returnModal">İadə</button>
                                                @else

                                                @endif
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
    </div>

    @include('user.modals.return_modal')
@endsection
