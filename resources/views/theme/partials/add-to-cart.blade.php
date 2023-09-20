<form class="form-add-to-cart" action="{{ route('add-to-cart') }}" method="post">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <div class="d-flex align-items-center gap-4 justify-content-between">
        <div class="d-flex align-items-center gap-4">
            <button type="button" class="btn btn-outline-dark minus">-</button>
            <input class="form-control amount" type="number" name="amount" value="1">
            <button type="button" class="btn btn-outline-dark plus">+</button>
        </div>
        <button type="submit" class="add-to-cart btn btn-primary">Add to cart</button>
    </div>
</form>
