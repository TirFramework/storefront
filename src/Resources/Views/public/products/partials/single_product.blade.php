<a href="{{ route('products.show', $product->slug) }}" class="single-product">
    @if (! $product->image)
        <div class="image-placeholder">
            <i class="fa fa-picture-o" aria-hidden="true"></i>
        </div>
    @else
        <div class="image-holder">
            <img src="{{ $product->image }}">
        </div>
    @endif

    <div class="single-product-details">
        <span class="product-name">{{ $product->name }}</span>

        <span class="product-price">
            {{ \Tir\Store\Product\Support\Price::render($product) }}
        </span>
    </div>
</a>
