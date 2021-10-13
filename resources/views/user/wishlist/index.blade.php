@extends('user.main_master')
@section('content')
@section('title')
    İstək Listim
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="/">Ana Səhifə</a></li>
                <li class='active'>İstək Listim</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="my-wishlist-page">
            <div class="row">
                <div class="col-md-12 my-wishlist">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="4" class="heading-title">Mənim İstək Listim</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishlists as $wishlist)
                                    <tr>
                                        <td class="col-md-2"><img
                                                src="{{ asset($wishlist->product->thumbnail) }}" alt="imga">
                                        </td>
                                        <td class="col-md-7">
                                            <div class="product-name"><a
                                                    href="{{ route('user.product.detail', $wishlist->product->slug) }}">{{ $wishlist->product->name }}</a>
                                            </div>
                                            <div>
                                                @if ($wishlist->product->discount_price == null or $wishlist->product->discount_price == 0)
                                                    <span
                                                        class="price">{{ $wishlist->product->selling_price }} Azn</span>
                                                @else
                                                    <span
                                                        class="price">{{ $wishlist->product->discount_price }} Azn</span>
                                                    <del>{{ $wishlist->product->selling_price }} Azn</del>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="col-md-2">
                                            <button class="btn btn-primary icon" data-toggle="modal"
                                                data-target="#productModal" type="button"
                                                id="{{ $wishlist->product->id }}" onclick="productCart(this.id)">
                                                Səbətə ƏLavə Et
                                            </button>
                                        </td>
                                        <td class="col-md-1 close-btn">
                                            <button type="submit" id="{{ $wishlist->product->id }}" onclick="RemoveWishlist(this.id)" class="btn btn-danger"><i class=" fa fa-times"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
    </div><!-- /.container -->
    @include('user.partials._brands')
</div><!-- /.body-content -->

@endsection

<script>
    function RemoveWishlist(id) {
            var url = '{{ route('user.wishlist.remove', ':id') }}';
            url = url.replace(':id', id);

            $.ajax({
                type: "GET",
                dataType: "json",
                url: url,
                success: function(data) {
                    location.reload();
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
