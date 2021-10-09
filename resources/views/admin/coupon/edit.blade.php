@extends('admin.admin_master')
@section('content')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Kupon Güncəllə</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('admin.coupon.update',$coupon->id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Kupon<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="name" name="name" class="form-control" value="{{ $coupon->name }}">
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
                                            <input type="number" id="discount" name="discount" class="form-control" value="{{ $coupon->discount }}"
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
                                            <input type="date" id="validity" name="validity" class="form-control" value="{{ $coupon->validity }}"
                                                min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                            @error('validity')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Güncəllə">
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
