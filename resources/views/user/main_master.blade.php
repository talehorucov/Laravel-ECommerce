<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>@yield('title')</title>
    <!-- Bootstrap Core CSS -->

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">


    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    @include('user.partials._header')

    <!-- ============================================== HEADER : END ============================================== -->
    @yield('content')
    <!-- /#top-banner-and-menu -->

    <!-- ============================================================= FOOTER ============================================================= -->
    @include('user.partials._footer')
    <!-- ============================================================= FOOTER : END============================================================= -->

    @include('user.modals.add_to_cart_modal')
    <!-- For demo purposes – can be removed on production -->

    <!-- For demo purposes – can be removed on production : End -->

    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
    <!-- safe -->
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <!-- safe -->
    <script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
    <!-- safe -->
    <script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
    <!-- safe -->
    <script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
    <!-- safe -->
    <script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
    <!-- safe -->
    <script src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
    <!-- safe -->
    <script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
    <!-- safe -->
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <!-- safe -->
    <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
    <!-- safe -->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;
        
            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
        
            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
        
            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
            }
        @endif
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    </script>

    {{-- Add To Cart --}}
    <script>
        function addToCart() {
            var id = $('#product_id').val();
            var url = '{{ route('addtocart', ':id') }}';
            url = url.replace(':id', id);

            var color = $('#color option:selected').val();
            var size = $('#size option:selected').val();
            var quantity = $('#product_quantity').val();
            $.ajax({
                type: "GET",
                dataType: "json",
                data: {
                    id: id,
                    color: color,
                    size: size,
                    quantity: quantity
                },
                url: url,
                success: function(data) {
                    miniCart()
                    $('#productModal').modal('hide');

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: data.success,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
    </script>

    {{-- Mini Cart --}}
    <script>
        function miniCart() {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('add.miniCart') }}",
                success: function(response) {
                    $('span[id="cart_quantity"]').text(response.cart_count);
                    $('span[id="cart_subtotal"]').text(response.cart_total);
                    var mini_cart = '';

                    $.each(response.carts, function(key, value) {
                        mini_cart += `<div class="cart-item product-summary">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="image"> <a href="detail.html">
                                                    <img src="/${value.options.image}"
                                                        alt=""></a> </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                                            <div class="price">${value.price} Azn * ${value.qty} </div>
                                        </div>
                                        <div class="col-xs-1 action"> <button type="submit" id="${value.rowId}"
                                            onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr>`

                    })
                    $('#mini_cart').html(mini_cart);
                }
            })
        }
        miniCart();
    </script>

    <script>
        function miniCartRemove(rowId) {
            var url = '{{ route('remove.miniCart', ':rowId') }}';
            url = url.replace(':rowId', rowId);

            $.ajax({
                type: "GET",
                dataType: "json",
                url: url,
                success: function(data) {
                    miniCart();
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: data.success,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        }
    </script>

    <script>
        function addToWishList(id) {
            var url = '{{ route('add.wishlist', ':id') }}';
            url = url.replace(':id', id);

            $.ajax({
                type: "POST",
                dataType: "json",
                url: url,
                success: function(data) {
                    if (data.success) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: data.success,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else if (data.danger) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: data.danger,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: data.error,
                            showConfirmButton: false,
                            footer: '<a href="{{ route('login') }}"><h5>Daxil Ol</h5></a>',
                            timer: 1500
                        })
                    }
                }
            })
        }
    </script>
</body>

</html>
