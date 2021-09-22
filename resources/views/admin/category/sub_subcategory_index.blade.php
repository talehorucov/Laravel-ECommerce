@extends('admin.admin_master')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sub->SubCategory List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Category</th>
                                            <th class="text-center">SubCategory</th>
                                            <th class="text-center">Name Eng</th>
                                            <th class="text-center">Name Aze</th>
                                            <th width=25% class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subsubcategories as $subsubcategory)
                                            <tr>
                                                <td> {{ $subsubcategory['category']['name_eng'] }}</td>
                                                <td> {{ $subsubcategory['subcategory']['name_eng'] }}</td>
                                                <td><span>{{ $subsubcategory->name_eng }}</span></td>
                                                <td><span>{{ $subsubcategory->name_aze }}</span></td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.subsubcategory.edit', $subsubcategory->id) }}"
                                                        title="Edit Sub->SubCategory" class="btn btn-primary"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('admin.subsubcategory.delete', $subsubcategory->id) }}"
                                                        title="Delete Sub->SubCategory" class="btn btn-danger delete"><i
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
                            <h3 class="box-title">Add Sub->SubCategory</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('admin.subsubcategory.create') }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Category Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control">
                                                <option value="" disabled selected>Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name_eng }}
                                                    </option>
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
                                        <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_id" class="form-control">
                                                <option value="" disabled selected>Select SubCategory</option>
                                               
                                            </select>
                                        </div>
                                        @error('subcategory_id')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <h5>Sub->SubCategory Name Eng<span class="text-danger">*</span></h5>
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
                                        <h5>Sub->SubCategory Name Aze<span class="text-danger">*</span></h5>
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

    <script>
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/admin/category/sub/sub/ajax') }}/"+category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id +
                                    '">' + value.name_eng + '</option>');
                            });
                        },
                    });
                }
                else {
                    alert('Error');
                }
            });
        });
    </script>

@endsection
