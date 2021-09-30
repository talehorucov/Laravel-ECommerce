@extends('admin.admin_master')
@section('content')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Product List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Product Name</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Discount</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td><img src="{{ asset($product->thumbnail) }}"
                                                        style="width: 60px; height:50px"></td>
                                                <td><span style="font-size: 15px">{{ $product->name }}</span></td>
                                                <td><span style="font-size: 15px">{{ $product->quantity }}</span></td>
                                                <td><span style="font-size: 15px">{{ $product->selling_price }}$</span>
                                                </td>
                                                <td class="text-center" >
                                                    @if ($product->discount_price == null)
                                                        <span class="badge badge-pill badge-danger">Endirim Yoxdur</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">{{ $product->discount_percent }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($product->status == 1)
                                                        <span class="badge badge-pill badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">InActive</span>
                                                    @endif
                                                </td>
                                                <td class="text-center" style="width: 215px">
                                                    <a href="{{ route('admin.product.info', $product->slug) }}"
                                                        title="Product Detail" class="btn btn-info"><i
                                                            class="fa fa-question"></i></a>
                                                    <a href="{{ route('admin.product.edit', $product->id) }}"
                                                        title="Edit Product" class="btn btn-primary"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('admin.product.delete', $product->id) }}"
                                                        title="Delete Product" class="btn btn-danger delete"><i
                                                            class="fa fa-trash"></i></a>
                                                    @if ($product->status == 1)
                                                        <a href="{{ route('admin.product.inactive', $product->id) }}"
                                                            title="Do InActive" class="btn btn-warning"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{ route('admin.product.active', $product->id) }}"
                                                            title="Do Active" class="btn btn-success"><i
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
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection
