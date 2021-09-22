@extends('admin.admin_master')
@section('content')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">SubCategory List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th width=20% class="text-center">Category</th>
                                            <th width=29% class="text-center">SubCategory Name Eng</th>
                                            <th width=29% class="text-center">SubCategory Name Aze</th>
                                            <th width=22% class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcategories as $subcategory)
                                            <tr>
                                                <td> {{ $subcategory['category']['name_eng'] }}</td>
                                                <td><span>{{ $subcategory->name_eng }}</span></td>
                                                <td><span>{{ $subcategory->name_aze }}</span></td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.subcategory.edit', $subcategory->id) }}"
                                                        title="Edit SubCategory" class="btn btn-primary"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('admin.subcategory.delete', $subcategory->id) }}"
                                                        title="Delete SubCategory" class="btn btn-danger delete"><i
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
                            <h3 class="box-title">Add SubCategory</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('admin.subcategory.create') }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Category Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control">
                                                <option value="" disabled selected>Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name_eng }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('category_id')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>SubCategory Name Eng<span class="text-danger">*</span></h5>
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
                                        <h5>SubCategory Name Aze<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="name_aze" name="name_aze" class="form-control">
                                            @error('name_aze')
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
