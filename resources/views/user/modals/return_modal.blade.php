<div class="modal fade" id="returnModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">İadə Səbəbi</h5>
            </div>
            <div class="modal-body">
                <form method="GET" action="{{ route('return_order', $order_detail->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="return_reason">İadə Səbəbi</label>
                        <textarea class="form-control" name="return_reason" cols="30" rows="5"></textarea>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Ləğv Et</button>
                <button type="submit" class="btn btn-primary">Göndər</button>
            </div>
            </form>
        </div>
    </div>
</div>
