@extends('admin.admin_master')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Product</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('admin.product.update', $product->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Brand Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="brand_id" class="form-control" required>
                                                            <option value="" disabled selected>Select Brand</option>
                                                            @foreach ($brands as $brand)
                                                                <option value="{{ $brand->id }}"
                                                                    {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                                                    {{ $brand->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('brand_id')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" class="form-control" required>
                                                            <option value="" disabled selected>Select Category</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}"
                                                                    {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                                    {{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('category_id')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subcategory_id" class="form-control" required>
                                                            <option value="" disabled selected>Select SubCategory</option>
                                                            @foreach ($subcategories as $subcategory)
                                                                <option value="{{ $subcategory->id }}"
                                                                    {{ $subcategory->id == $product->subcategory_id ? 'selected' : '' }}>
                                                                    {{ $subcategory->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('subcategory_id')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Sub->SubCategory Select <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subsubcategory_id" class="form-control" required>
                                                            <option value="" disabled selected>Select Sub->SubCategory
                                                            </option>
                                                            @foreach ($subsubcategories as $subsubcategory)
                                                                <option value="{{ $subsubcategory->id }}"
                                                                    {{ $subsubcategory->id == $product->subsubcategory_id ? 'selected' : '' }}>
                                                                    {{ $subsubcategory->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('subsubcategory_id ')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" required
                                                            value="{{ $product->name }}">
                                                    </div>
                                                    @error('name')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <h5>Product Code <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="code" class="form-control" required
                                                                value="{{ $product->code }}">
                                                        </div>
                                                        @error('code')
                                                            <span class="text-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Quantity <span class="text-danger">*</span></h5>
                                                    <div class="input-group"> <span class="input-group-addon">$</span>
                                                        <input type="number" name="quantity" class="form-control" min="0"
                                                            required value="{{ $product->quantity }}">
                                                        <span class="input-group-addon">.00</span>
                                                    </div>

                                                    @error('quantity')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Selling Price <span class="text-danger">*</span></h5>
                                                    <div class="input-group"> <span class="input-group-addon">$</span>
                                                        <input type="number" name="selling_price" class="form-control"
                                                            min="0" required value="{{ $product->selling_price }}">
                                                        <span class="input-group-addon">.00</span>
                                                    </div>

                                                    @error('selling_price')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Discount Price <span class="text-danger">*</span></h5>
                                                    <div class="input-group"> <span class="input-group-addon">$</span>
                                                        <input type="number" name="discount_price" class="form-control"
                                                            min="0"
                                                            value="{{ $product->discount_price == null ? 0 : $product->discount_price }}">
                                                        <span class="input-group-addon">.00</span>
                                                    </div>

                                                    @error('discount_price')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Tags <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="tags"
                                                            value="{{ $product->tags }}" data-role="tagsinput"
                                                            class="form-control" required>
                                                    </div>
                                                    @error('tags')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Size <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="size"
                                                            value="{{ $product->size }}" data-role="tagsinput"
                                                            class="form-control">
                                                    </div>
                                                    @error('size')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Color <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="color"
                                                            value="{{ $product->color }}" data-role="tagsinput"
                                                            class="form-control" required>
                                                    </div>
                                                    @error('color')
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Short Description <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_desc" class="form-control" required
                                                            placeholder="Short Description">{{ $product->short_desc }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Long Description <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="long_desc" id="editor1" rows="10" cols="80">
                                                            {{ $product->long_desc }}
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_2" name="hot_deals" value="1"
                                                        {{ $product->hot_deals == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_2">Hot Deals</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_3" name="featured" value="1"
                                                        {{ $product->featured == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_3">Featured</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_4" name="special_offer" value="1"
                                                        {{ $product->special_offer == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_4">Special Offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_5" name="special_deal" value="1"
                                                        {{ $product->special_deal == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_5">Special Deal</label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->

        <!-- Multiple Image Section -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Multiple Image <strong>Update</strong></h4>
                        </div>

                        <form method="post" action="{{ route('admin.product.images.update') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row row-sm">
                                @foreach ($multi_images as $image)
                                    <div class="col-md-3" style="margin-left: 25px; margin-top:20px">
                                        <div class="card">
                                            <img class="card-img-top" src="{{ asset($image->name) }}"
                                                style="width: 280px; height:180px;object-fit: fill;">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <a href="{{ route('admin.product.image.delete', $image->id) }}"
                                                        class="btn btn-danger delete" title="Delete Image">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </h5>
                                                <p class="card-text">
                                                <div class="form-group">
                                                    <label class="form-control-label">Change Image <span
                                                            class="text-danger">*</span></label>
                                                    <input type="file" class="form-cotrol"
                                                        name="multi_img[{{ $image->id }}]">
                                                </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-xs-right" style="margin-left: 25px;">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Images">
                            </div><br>
                        </form>
                    </div>
                </div>
            </div>
        </section>


        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Thumbnail Image <strong>Update</strong></h4>
                        </div>

                        <form method="post" action="{{ route('admin.product.thumbnail.update', $product->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_image" value="{{ $product->thumbnail }}">
                            <div class="row row-sm" style="margin-left: 5px; margin-top:20px">
                                <div class="col-md-3">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ asset($product->thumbnail) }}"
                                            style="width: 280px; height:180px;object-fit: fill;">
                                        <div class="card-body">
                                            <p class="card-text">
                                            <div class="form-group">
                                                <label class="form-control-label">Change Thumbnail <span
                                                        class="text-danger">*</span></label>
                                                <input type="file" name="thumbnail" class="form-control"
                                                    onchange="mainThumbURL(this)">
                                                <img src="" id="mainThumb">
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xs-right" style="margin-left: 25px;">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Thumbnail">
                            </div><br>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/admin/category/sub/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subsubcategory_id"]').html('');
                            $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('Error');
                }
            });

            $('select[name="subcategory_id"]').on('change', function() {
                var subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        url: "{{ url('/admin/category/sub/sub/ajax') }}/" + subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log(data)
                            var d = $('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subsubcategory_id"]').append(
                                    '<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('Error');
                }
            });
        });
    </script>

    <script>
        function mainThumbURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThumb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                $('#preview_img').html('');
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(80)
                                        .height(80); //create image element 
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>

@endsection
