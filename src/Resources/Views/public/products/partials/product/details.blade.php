<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
    <div class="product-details">
        <h1 class="product-name">{{ $product->name }}</h1>

        <div class=" col-sm-6 col-xs-12">
            @if (Stg::get('reviews_enabled'))
                @include('storefront::public.products.partials.product.rating', ['rating' => $product->avgRating()])

                <span class="product-review">
                {{-- TODO:Check intl_number Function --}}
                    {{-- ({{ intl_number($product->reviews->count()) }} {{ trans('storefront::product.customer_reviews') }})--}}
                ({{ $product->reviews->count() }} {{ trans('storefront::product.customer_reviews') }})
            </span>
            @endif

            @unless (is_null($product->sku))
                <div class="sku">
                    <label>{{ trans('storefront::product.sku') }}: </label>
                    <span>{{ $product->sku }}</span>
                </div>
            @endunless

            @if ($product->manage_stock)
                <span class="left-in-stock">
                {{ trans('storefront::product.only') }}
                    {{-- TODO:Check intl_number Function --}}
                    {{-- <span class="{{ $product->qty > 0 ? 'green' : 'red' }}">{{ intl_number($product->qty) }}</span>--}}
                <span class="{{ $product->qty > 0 ? 'green' : 'red' }}">{{ $product->qty }}</span>
                {{ trans('storefront::product.left') }}
            </span>
            @endif

            <div class="clearfix"></div>

            <span class="product-price pull-left">{{ \Tir\Store\Product\Support\Price::render($product) }}</span>

            <div class="availability pull-left">
                <label>{{ trans('storefront::product.availability') }}:</label>

                @if ($product->in_stock)
                    <span class="in-stock">{{ trans('storefront::product.in_stock') }}</span>
                @else
                    <span class="out-of-stock">{{ trans('storefront::product.out_of_stock') }}</span>
                @endif
            </div>

            <div class="clearfix"></div>


            <form method="POST" action="{{ route('cart.items.store') }}" class="clearfix">
                {{ csrf_field() }}

                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="product-variants clearfix">
                    @foreach ($product->options as $option)
                        <div class="row">
                            <div class="col-md-7 col-sm-9 col-xs-10">
                                @includeIf("public.products.partials.product.options.{$option->type}")
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="quantity pull-left clearfix">
                    <label class="pull-left" for="qty">{{ trans('storefront::product.qty') }}</label>

                    <div class="input-group-quantity pull-left clearfix">
                        <input type="text" name="qty" value="1" class="input-number input-quantity pull-left" id="qty" min="1" max="{{ $product->manage_stock ? $product->qty : '' }}">

                        <span class="pull-left btn-wrapper">
                        <button type="button" class="btn btn-number btn-plus" data-type="plus"> + </button>
                        <button type="button" class="btn btn-number btn-minus" data-type="minus" disabled> &#8211; </button>
                    </span>
                    </div>
                </div>

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

            <div class="clearfix"></div>

            <div class="add-to clearfix">
                <form method="POST" action="{{ route('wishlist.store') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <button type="submit">{{ trans('storefront::product.add_to_wishlist') }}</button>
                </form>

                <form method="POST" action="{{ route('compare.store') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <button type="submit">{{ trans('storefront::product.add_to_compare') }}</button>
                </form>
            </div>
        </div>

        <div class=" col-sm-6 col-xs-12">
            @if (! is_null($product->summary))
                <div class="product-brief">{!! $product->summary !!}</div>
            @endif
        </div>

    </div>
</div>
