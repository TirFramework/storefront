@extends('storefront::public.layout')

@section('title', trans('storefront::compare.compare'))

@section('content')
    <section class="compare">
        @if ($compare->hasAnyProduct())
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>{{ trans('storefront::compare.product_overview') }}</td>

                            @foreach ($compare->products() as $product)
                                <td class="product-overview">
                                    @if (! $product->image)
                                        <div class="image-placeholder">
                                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                                        </div>
                                    @else
                                        <div class="image-holder">
                                            <img src="{{ $product->image }}">
                                        </div>
                                    @endif

                                    <h5>
                                        <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                                    </h5>
                                    <form method="POST" action="{{ route('compare.destroy', $product) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}

                                        <button type="submit" class="btn-close">&times;</button>
                                    </form>
                                </td>
                            @endforeach
                        </tr>

                        <tr>
                            <td>{{ trans('storefront::compare.price') }}</td>

                            @foreach ($compare->products() as $product)
                                <td>
                                    <span class="product-price">{{ \Tir\Store\Product\Support\Price::render($product) }}</span>
                                </td>
                            @endforeach
                        </tr>

                        @foreach ($compare->attributes() as $attribute)
                            <tr>
                                <td>{{ $attribute->name }}</td>

                                @foreach ($compare->products() as $product)
                                    @if ($product->hasAttribute($attribute))
                                        <td>{{ $product->attributeValues($attribute) }}</td>
                                    @else
                                        <td>&ndash;</td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach

                        <tr>
                            <td>{{ trans('storefront::compare.add_to_cart') }}</td>

                            @foreach ($compare->products() as $product)
                                <td>
                                    @if ($product->options_count > 0)
                                        <a href="{{ route('products.show', $product->slug) }}" class="btn btn-primary">
                                            {{ trans('storefront::compare.view_details') }}
                                        </a>
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
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <h2 class="text-center">{{ trans('storefront::compare.no_product') }}</h2>

            <a href="{{ url()->previous() }}" class="go-back-link">
                <i class="fa fa-reply" aria-hidden="true"></i>
                {{ trans('storefront::compare.go_back') }}
            </a>
        @endif
    </section>
@endsection
