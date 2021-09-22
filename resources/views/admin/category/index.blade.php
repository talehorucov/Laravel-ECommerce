@extends('admin.admin_master')
@section('content')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Category List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width=20px class="text-center">Icon</th>
                                            <th width=130px class="text-center">Category Name Eng</th>
                                            <th width=130px class="text-center">Category Name Aze</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td class="text-center"><span style="font-size: 30px"><i class="{{ $category->icon }}"></i></span></td>
                                                <td><span style="font-size: 15px">{{ $category->name_eng }}</span></td>
                                                <td><span style="font-size: 15px">{{ $category->name_aze }}</span></td>                                                
                                                <td class="text-center">
                                                    <a href="{{ route('admin.category.edit', $category->id) }}"
                                                        title="Edit Category" class="btn btn-primary"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('admin.category.delete', $category->id) }}"
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

                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('admin.category.create') }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Category Name Eng<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="name_eng" name="name_eng" class="form-control">
                                            @error('name_eng')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Category Name Aze<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="name_aze" name="name_aze" class="form-control">
                                            @error('name_aze')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Category Icon<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="icon" name="icon" class="form-control">
                                            @error('icon')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>                                    
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
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
