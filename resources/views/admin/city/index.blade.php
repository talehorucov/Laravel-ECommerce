@extends('admin.admin_master')
@section('content')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Şəhərlər</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Şəhər</th>
                                            <th class="text-center">Dəyişiklik</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cities as $city)
                                            <tr>
                                                <td style="font-size: 18px" class="text-center">{{ $city->name }}</td>
                                                <td width=30% class="text-center">
                                                    <a href="{{ route('admin.city.edit', $city) }}"
                                                        class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ route('admin.city.delete', $city) }}"
                                                        class="btn btn-danger delete"><i
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
                            <h3 class="box-title">Şəhər Əlavə Et</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('admin.city.create') }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Şəhər<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="name" name="name" class="form-control">
                                            @error('name')
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
