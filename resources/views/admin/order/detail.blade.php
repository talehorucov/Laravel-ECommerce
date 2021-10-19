@extends('admin.admin_master')
@section('content')

    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3>Sifariş Haqqında Geniş Məlumat</h3>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Sifariş haqqında</strong></h4>
                        </div>
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
                                        <span class="badge badge-pill badge-warning" style="background:red">Yoxdur</span>
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
                            <tr>
                                <th>Statusu Dəyiş:</th>
                                <th>
                                    @if ($order->status == 'Pending')
                                        <a href="{{ route('pending_to_confirm', $order->order_number) }}"
                                            class="btn btn-block btn-success" id="confirm">Sifarişi Təsdiq Olundu</a>
                                    @elseif ($order->status == 'Confirmed')
                                        <a href="{{ route('confirm_to_processing', $order->order_number) }}"
                                            class="btn btn-block btn-success" id="processing">Sifarişi Emal Olundu</a>
                                    @elseif ($order->status == 'Processing')
                                        <a href="{{ route('processing_to_picked', $order->order_number) }}"
                                            class="btn btn-block btn-success" id="picked">Sifariş Hazırlandı (Təsdiq Et)</a>
                                    @elseif ($order->status == 'Picked')
                                        <a href="{{ route('picked_to_shipped', $order->order_number) }}"
                                            class="btn btn-block btn-success" id="shipped">Sifariş Kargoya Verildi</a>
                                    @elseif ($order->status == 'Shipped')
                                        <a href="{{ route('shipped_to_delivered', $order->order_number) }}"
                                            class="btn btn-block btn-success" id="delivered">Sifariş Təhvil Verildi</a>
                                    @endif
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Bordered</strong> box</h4>
                        </div>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="col-md-2">
                                        <label>Şəkil</label>
                                    </td>
                                    <td class="col-md-4">
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
                                </tr>
                                @foreach ($order->order_details as $order_detail)
                                    <tr>
                                        <td class="col-md-2">
                                            <label><img src="{{ asset($order_detail->product->thumbnail) }}"
                                                    style="height:70px;width:70px"></label>
                                        </td>
                                        <td class="col-md-4">
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection
