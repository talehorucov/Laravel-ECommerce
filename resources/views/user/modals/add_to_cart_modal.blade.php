<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong id="product_name"></strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="product_id">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <img id="product_image" src="" class="card-img-top" alt="..."
                                style="width: 250px; height:200px; object-fit">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item">Qiymət:
                                <strong class="text-danger"><span id="selling_price"></span></strong>
                                <del><span id="discount_price"></span></del>
                            </li>
                            <li class="list-group-item">Kod: <strong id="code"></strong></li>
                            <li class="list-group-item">Kateqoriya: <strong id="category"></strong></li>
                            <li class="list-group-item">Brend: <strong id="brand"></strong></li>
                            <li class="list-group-item">Qalan:
                                <span class="badge badge-pill badge-success" id="quantity"
                                    style="background-color:green; color:white"></span>
                                <span class="badge badge-pill badge-danger" id="stock_out"
                                    style="background-color:red; color:white"></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="color">Rəng Seçin</label>
                            <select class="form-control" id="color" name="colors">
                            </select>
                        </div>

                        <div class="form-group" id="sizeArea">
                            <label for="size">Ölçü Seçin</label>
                            <select class="form-control" id="size" name="sizes">
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Miqdar</label><br>
                            <input class="form-control" value="1" type="number" id="product_quantity" name="quantity" min="1">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" onclick="addToCart()">Səbətə Əlavə
                            Et</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
    function productCart(id) {
        var url = '{{ route('ajax.product.modal', ':id') }}';
        url = url.replace(':id', id);
        $.ajax({
            type: 'GET',
            url: url,
            dataType: 'json',
            success: function(data) {
                $('#product_name').text(data.product.name);
                $('#price').text(data.product.selling_price + ' Azn');
                $('#code').text(data.product.code);
                $('#category').text(data.product.category.name);
                $('#brand').text(data.product.brand.name);
                $('#product_image').attr('src', '/' + data.product.thumbnail);
                $('#product_id').val(id);
                $('#quantity').val(1);

                if (data.product.discount_price == null || data.product.discount_price == 0) {
                    $('#discount_price').text('');
                    $('#selling_price').text('');
                    $('#selling_price').text(data.product.selling_price + ' Azn');
                } else {
                    $('#discount_price').text(data.product.selling_price + ' Azn');
                    $('#selling_price').text(data.product.discount_price + ' Azn');
                }

                if (data.product.quantity > 0) {
                    $('#quantity').text('');
                    $('#stock_out').text('');
                    $('#quantity').text(data.product.quantity)
                } else {
                    $('#quantity').text('');
                    $('#stock_out').text('');
                    $('#stock_out').text('Məhsul Tükənmişdir')
                }

                $('select[name="colors"]').empty();
                $.each(data.product.colors, function(key, value) {
                    $('select[name="colors"]').append('<option value="' + value.name + '">' + value
                        .name + '</option>')
                })

                $('select[name="sizes"]').empty();
                if (data.product.sizes.length == 0) {
                    $('#sizeArea').hide();
                } else {
                    $.each(data.product.sizes, function(key, value) {
                        $('select[name="sizes"]').append('<option value="' + value.name + '">' + value
                            .name + '</option>')
                    })
                }

            }
        })
    }

</script>