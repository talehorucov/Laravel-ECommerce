@extends('admin.admin_master')
@section('content')

    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Kateqoriyanı Düzənlə</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <form method="POST" action="{{ route('admin.category.update',$category->id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <h5>Kateqoriya Adı<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="name" name="name" class="form-control" value="{{ $category->name }}">
                                            @error('name')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>İkon<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" id="icon" name="icon" class="form-control" value="{{ $category->icon }}">
                                            @error('icon')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>                                    
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Düzənlə">
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
