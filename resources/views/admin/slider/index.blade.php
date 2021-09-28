@extends('admin.admin_master')
@section('content')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Slider List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sliders as $slider)
                                            <tr>
                                                <td class="text-center"><img src="{{ asset($slider->image) }}"
                                                        alt="image" style="width: 80px; height:45px"></td>
                                                <td>
                                                    @if ($slider->title)
                                                        {{ $slider->title }}
                                                    @else
                                                        <span class="badge badge-pill badge-danger">No Title</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($slider->description)
                                                        {{ Str::limit($slider->description, 50) }}
                                                    @else
                                                        <span class="badge badge-pill badge-danger">No Description</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($slider->status == 1)
                                                        <span class="badge badge-pill badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">InActive</span>
                                                    @endif
                                                </td>

                                                <td width=25% class="text-center">
                                                    <a href="{{ route('admin.slider.edit', $slider->id) }}"
                                                        title="Edit Slider" class="btn btn-primary btn-sm"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('admin.slider.delete', $slider->id) }}"
                                                        title="Delete Slider" class="btn btn-danger delete btn-sm"><i
                                                            class="fa fa-trash"></i></a>
                                                    @if ($slider->status == 1)
                                                        <a href="{{ route('admin.slider.inactive', $slider->id) }}"
                                                            title="Do InActive" class="btn btn-warning btn-sm"><i
                                                                class="fa fa-arrow-down"></i></a>
                                                    @else
                                                        <a href="{{ route('admin.slider.active', $slider->id) }}"
                                                            title="Do Active" class="btn btn-success btn-sm"><i
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
                            <h3 class="box-title">Add Slider</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('admin.slider.create') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Slider Title <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="title" name="title" class="form-control">
                                            @error('title')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Slider Description <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="description" name="description" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Slider Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="image" class="form-control">
                                            @error('image')
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
