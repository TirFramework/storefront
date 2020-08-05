<div class="product-card">
    <a href="{{ route('products.show', $product->slug) }}" class="link-cart"></a>
    <div class="product-card-inner">
        <div class="product-image clearfix">
            <ul class="product-ribbon list-inline">
                @if ($product->isOutOfStock())
                    <li><span class="ribbon bg-red">{{ trans('storefront::product_card.out_of_stock') }}</span></li>
                @endif

                @if ($product->isNew())
                    <li><span class="ribbon bg-green">{{ trans('storefront::product_card.new') }}</span></li>
                @endif
            </ul>

                @if(! isset($product->image))
                    <div class="image-placeholder">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                    </div>
                @else
                    <div class="image-holder">
                        <img src="{{ $product->image }}">
                    </div>
                @endif

            <div class="quick-view-wrapper" data-toggle="tooltip" data-placement="top" title="{{ trans('storefront::product_card.quick_view') }}">
                <button type="button" class="btn btn-quick-view" data-slug="{{ $product->slug }}">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
            </div>
        </div>

        <div class="product-content clearfix">
            @if($product->call_for_price == 1)
                <span class="product-price">{{ trans('product::front.call_for_price') }}</span>
            @else
            <span class="product-price">
                {{ \Tir\Store\Product\Support\Price::render($product) }}
            </span>
            @endif
            <span class="product-name">{{ $product->name }}</span>
        </div>

        <div class="add-to-actions-wrapper">
            <form method="POST" action="{{ route('wishlist.store') }}">
                {{ csrf_field() }}

                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <button type="submit" class="btn btn-wishlist" data-toggle="tooltip" data-placement="{{ Crud::is_rtl() ? 'left' : 'right' }}" title="{{ trans('storefront::product_card.add_to_wishlist') }}">
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                </button>
            </form>

            @if ($product->options_count > 0)
                <button class="btn btn-default btn-add-to-cart" onClick="location = '{{ route('products.show', ['slug' => $product->slug]) }}'">
                    {{ trans('storefront::product_card.view_details') }}
                </button>
            @else
                <form method="POST" action="{{ route('cart.items.store') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="qty" value="1">
                    @if($product->call_for_price == 1)
                        <a href="/page/تماس-با-ما" class="btn btn-default btn-call"  href="/page/تماس-با-ما" >
                            {{ trans('storefront::product_card.call_for_price') }}
                        </a>
                    @else
                        <button class="btn btn-default btn-add-to-cart" {{ $product->isOutOfStock() ? 'disabled' : '' }}>
                            {{ trans('storefront::product_card.add_to_cart') }}
                        </button>
                    @endif
                </form>
            @endif

            <form method="POST" action="{{ route('compare.store') }}">
                {{ csrf_field() }}

                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <button type="submit" class="btn btn-compare" data-toggle="tooltip" data-placement="{{ Crud::is_rtl() ? 'right' : 'left' }}" title="{{ trans('storefront::product_card.add_to_compare') }}">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                </button>
            </form>
        </div>
    </div>
</div>
