@extends('admin.admin_master')
@section('content')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Kuponlar</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Kupon</th>
                                            <th class="text-center">Endirim</th>
                                            <th class="text-center">Bitmə Vaxtı</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Dəyişiklik</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($coupons as $coupon)
                                            <tr>
                                                <td class="text-center">{{ $coupon->name }}</td>
                                                <td class="text-center">{{ $coupon->discount }} %</td>
                                                <td class="text-center">
                                                    {{ Carbon\Carbon::parse($coupon->validity)->format('D, d F Y') }}</td>
                                                <td class="text-center">
                                                    @if ($coupon->status == 1)
                                                        <span class="badge badge-pill badge-success">Aftiv</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">Deaktiv</span>
                                                    @endif
                                                </td>
                                                <td class="text-center" width=25%>
                                                    <a href="{{ route('admin.coupon.edit', $coupon->id) }}"
                                                        class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('admin.coupon.delete', $coupon->id) }}"
                                                        class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i></a>
                                                    @if ($coupon->status == 1)
                                                        <a href="{{ route('admin.coupon.inactive', $coupon) }}"
                                                            title="Do InActive" class="btn btn-sm btn-warning"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{ route('admin.coupon.active', $coupon) }}"
                                                            title="Do Active" class="btn btn-sm btn-success"><i
                                                                class="fa fa-arrow-up"></i></a>
                                                    @endif
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

                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Kupon Yarat</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('admin.coupon.create') }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Kupon<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="name" name="name" class="form-control">
                                            @error('name')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Endirim (%)<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="number" id="discount" name="discount" class="form-control"
                                                value="1" min="1" min="100">
                                            @error('discount')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Bitmə Vaxtı<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" id="validity" name="validity" class="form-control"
                                                min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                            @error('validity')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Əlavə Et">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection
