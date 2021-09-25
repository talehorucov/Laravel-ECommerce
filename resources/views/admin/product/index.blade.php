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
                                            <th class="text-center">Product Name Eng</th>
                                            <th class="text-center">Product Name Aze</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td><img src="{{ asset($product->thumbnail) }}" style="width: 60px; height:50px"></td>
                                                <td><span style="font-size: 15px">{{ $product->name_eng }}</span></td>
                                                <td><span style="font-size: 15px">{{ $product->name_aze }}</span></td>
                                                <td><span style="font-size: 15px">{{ $product->quantity }}</span></td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.product.edit', $product->id) }}"
                                                        title="Edit Product" class="btn btn-primary"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('admin.category.delete', $product->id) }}"
                                                        title="Delete Category" class="btn btn-danger delete"><i
                                                            class="fa fa-trash"></i></a>
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
