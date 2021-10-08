@extends('user.main_master')
@section('content')
@section('title')
    Mənim Səbətim
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="/">Ana Səhifə</a></li>
                <li class='active'>Mənim Səbətim</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row ">
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-romove item">Şəkil</th>
                                    <th class="cart-description item">Ad</th>
                                    <th class="cart-product-name item">Rəng</th>
                                    <th class="cart-edit item">Ölçü</th>
                                    <th class="cart-qty item">Miqdar</th>
                                    <th class="cart-sub-total item">Toplam</th>
                                    <th class="cart-total last-item">Sil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carts as $cart)
                                    <tr>
                                        <td style="text-align: center" class="col-md-2">
                                            <img style="width:90px;height:90px;" src="{{ asset($cart->options->image) }}">
                                        </td>
                                        <td style="text-align: center" class="col-md-2">
                                            <div class="product-name">
                                                <a href="#">{{ $cart->name }}</a>
                                            </div>
                                            <div class="price">
                                                {{ $cart->price }} Azn
                                            </div>
                                        </td>
                                        <td style="text-align: center" class="col-md-2">
                                            {{ $cart->options->color }}
                                        </td>
                                        <td style="text-align: center" class="col-md-2">
                                            @if ($cart->options->size)
                                                {{ $cart->options->size }}
                                            @else
                                                Rəng Yoxdur
                                            @endif                                            
                                        </td>
                                        <td style="text-align: center" class="col-md-2">
                                            <input style="width:25px" type="text" name="quantity" value="{{ $cart->qty }}" min="1" disabled> 
                                            </td>
                                        <td style="text-align: center" class="col-md-2">
                                            {{ $cart->subtotal }} Azn
                                        </td>
                                        <td style="text-align: center" class="col-md-1 close-btn">
                                            <button type="submit" id="{{ $cart->rowId }}"
                                                onclick="RemoveCart(this.id)" class="btn btn-danger"><i
                                                    class=" fa fa-times"></i></button>
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
    function RemoveCart(id) {
        var url = '{{ route('user.cart.remove', ':id') }}';
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
