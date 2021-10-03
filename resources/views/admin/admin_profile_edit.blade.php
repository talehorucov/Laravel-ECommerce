@extends('admin.admin_master')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Admin Profile Edit</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('admin.profile.update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin User Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" id="name" name="name" class="form-control"
                                                            required value="{{ $editData->name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin Email <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" id="email" name="email" class="form-control"
                                                            required value="{{ $editData->email }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Profile Image <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" id="image" name="profile_photo_path"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <img src="{{ !empty($editData->profile_photo_path) ? url('upload/admin_images/' . $editData->profile_photo_path) : url('upload/no_image.jpg') }}"
                                                    style="width: 100px; height:100px;" id="showImage">
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
        </section>
    </div>

    <script>
        $(document).ready(() => {
            $("#image").change(function() {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $("#showImage").attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
