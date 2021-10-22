@extends('admin.admin_master')
@section('content')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Təsdiqlənmiş Sifarişlər</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Tarix</th>
                                            <th class="text-center">Sifariş №</th>
                                            <th class="text-center">Kupon</th>
                                            <th class="text-center">Məbləğ</th>
                                            <th class="text-center">Dəyişiklik</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td class="text-center">{{ $order->created_at }}</td>
                                                <td class="text-center">{{ $order->order_number }} </td>
                                                <td class="text-center">{{ $order->coupon }}</td>
                                                <td class="text-center">{{ $order->amount ?? $order->discount_amount }} Azn</td>
                                                <td class="text-center" width=25%>
                                                    <a href="{{ route('admin.order.detail', $order->order_number) }}"
                                                        class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                    <a href="{{ route('admin.coupon.delete', $order) }}"
                                                        class="btn btn-danger delete"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection
