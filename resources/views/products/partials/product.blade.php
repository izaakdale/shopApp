<div class="productItem">

    <h3>
        <a href="{{route('products.show', ['product' => $product->id])}}">{{ $product->name }}</a>
    </h3>
    <br>
    <a href="{{ route('product.addToCart', ['id' => $product->id])}}" class="addToCartButton p-3">Add to Cart</a>
</div>