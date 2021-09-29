@extends('admin.admin_master')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Product Info</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Brand Name<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="brand_id" class="form-control">
                                                            <option selected disabled>{{ $product->brand->name }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Category Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" class="form-control">
                                                            <option selected disabled>{{ $product->category->name }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>SubCategory Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subcategory_id" class="form-control">
                                                            <option selected disabled>
                                                                {{ $product->subcategory->name }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Sub->SubCategory Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subsubcategory_id" class="form-control">
                                                            <option selected disabled>
                                                                {{ $product->subsubcategory->name }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Name <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control"
                                                            value="{{ $product->name }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <h5>Product Code <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="code" class="form-control"
                                                                value="{{ $product->code }}" disabled>
                                                        </div>
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
                                                            value="{{ $product->quantity }}" disabled>
                                                        <span class="input-group-addon">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Selling Price <span class="text-danger">*</span></h5>
                                                    <div class="input-group"> <span class="input-group-addon">$</span>
                                                        <input type="number" name="selling_price" class="form-control"
                                                            min="0" value="{{ $product->selling_price }}" disabled>
                                                        <span class="input-group-addon">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Discount Price <span class="text-danger">*</span></h5>
                                                    <div class="input-group"> <span class="input-group-addon">$</span>
                                                        <input type="number" name="discount_price" class="form-control"
                                                            min="0"
                                                            value="{{ $product->discount_price == null ? 0 : $product->discount_price }}"
                                                            disabled>
                                                        <span class="input-group-addon">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Tags <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="tags" value="{{ $product->tags }}"
                                                            data-role="tagsinput" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Size <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="size" value="{{ $product->size }}"
                                                            data-role="tagsinput" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h5>Product Color <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="color" value="{{ $product->color }}"
                                                            data-role="tagsinput" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Short Description <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="short_desc" class="form-control"
                                                            placeholder="Short Description"
                                                            disabled>{{ $product->short_desc }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Long Description <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="long_desc" id="editor1" rows="10" cols="80"
                                                            disabled>{{ $product->long_desc }}</textarea>
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
                                                        disabled {{ $product->hot_deals == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_2">Hot Deals</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_3" name="featured" value="1"
                                                        disabled {{ $product->featured == 1 ? 'checked' : '' }}>
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
                                                        disabled {{ $product->special_offer == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_4">Special Offer</label>
                                                </fieldset>
                                                <fieldset>
                                                    <input type="checkbox" id="checkbox_5" name="special_deal" value="1"
                                                        disabled {{ $product->special_deal == 1 ? 'checked' : '' }}>
                                                    <label for="checkbox_5">Special Deal</label>
                                                </fieldset>
                                            </div>
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
            <!-- /.box -->

        </section>
        <!-- /.content -->

        <!-- Multiple Image Section -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box bt-3 border-info">
                        <div class="box-header">
                            <h4 class="box-title">Multiple Images</h4>
                        </div>

                        <form>
                            <div class="row row-sm">
                                @foreach ($product->multiProductImg as $image)
                                    <div class="col-md-3" style="margin-left: 25px; margin-top:20px">
                                        <div class="card">
                                            <img class="card-img-top" src="{{ asset($image->name) }}"
                                                style="width: 280px; height:180px;object-fit: fill;">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
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
                            <h4 class="box-title">Thumbnail Image</h4>
                        </div>

                        <form>
                            <input type="hidden" name="old_image" value="{{ $product->thumbnail }}">
                            <div class="row row-sm" style="margin-left: 5px; margin-top:20px">
                                <div class="col-md-3">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ asset($product->thumbnail) }}"
                                            style="width: 280px; height:180px;object-fit: fill;">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
