@extends('admin.admin_master')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Sayt Parametrləri</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('update.site.setting',$site_setting) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Telefon Nömrəsi (1)</h5>
                                                    <div class="controls">
                                                        <input type="tel" name="phone_one" class="form-control"
                                                            value="{{ $site_setting->phone_one }}">
                                                        @error('phone_one')
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Telefon Nömrəsi (2)</h5>
                                                    <div class="controls">
                                                        <input type="tel" name="phone_two" class="form-control"
                                                            value="{{ $site_setting->phone_two }}">
                                                        @error('phone_two')
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Email</h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control"
                                                            value="{{ $site_setting->email }}">
                                                        @error('email')
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Şirkət Adı</h5>
                                                    <div class="controls">
                                                        <input type="text" name="company_name" class="form-control"
                                                            value="{{ $site_setting->company_name }}">
                                                        @error('company_name')
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Ünvan</h5>
                                                    <div class="controls">
                                                        <input type="text" name="company_address" class="form-control"
                                                            value="{{ $site_setting->company_address }}">
                                                        @error('company_address')
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>Facebook</h5>
                                                    <div class="controls">
                                                        <input type="text" name="facebook" class="form-control"
                                                            value="{{ $site_setting->facebook }}">
                                                        @error('facebook')
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5>LinkedIn</h5>
                                                    <div class="controls">
                                                        <input type="text" name="linkedin" class="form-control"
                                                            value="{{ $site_setting->linkedin }}">
                                                        @error('linkedin')
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Güncəllə">
                                        </div>
                                    </div>
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
@endsection
