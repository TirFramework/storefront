@extends('storefront::public.layout')

@section('title', $product->name)

@push('meta')
    <meta name="title" content="{{ $product->meta->meta_title }}">
    <meta name="keywords" content="{{ implode(',', $product->meta->meta_keywords) }}">
    <meta name="description" content="{{ $product->meta->meta_description }}">
    <meta property="og:title" content="{{ $product->meta->meta_title }}">
    <meta property="og:description" content="{{ $product->meta->meta_description }}">
    <meta property="og:image" content="{{ $product->image }}">
@endpush

@section('breadcrumb')
    <li><a href="{{ route('products.index') }}">{{ trans('storefront::products.shop') }}</a></li>
    <li class="active">{{ $product->name }}</li>
@endsection

@section('content')
    <div class="product-details-wrapper">
        <div class="row">
            @include('storefront::public.products.partials.product.images')
            @include('storefront::public.products.partials.product.details')
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tab product-tab clearfix">
                    <ul class="nav nav-tabs">
                        <li class="{{ request()->has('reviews') || Rviw::form_has_error($errors) ? '' : 'active' }}">
                            <a data-toggle="tab" href="#description">{{ trans('storefront::product.tabs.description') }}</a>
                        </li>

                        @if ($product->hasAnyAttribute())
                            <li>
                                <a data-toggle="tab" href="#additional-information">{{ trans('storefront::product.tabs.additional_information') }}</a>
                            </li>
                        @endif

                        @if (Stg::get('reviews_enabled'))
                            <li class="{{ request()->has('reviews') || Rviw::form_has_error($errors) ? 'active' : '' }} {{ Rviw::form_has_error($errors) ? 'error' : '' }}">
                                <a data-toggle="tab" href="#reviews">{{ trans('storefront::product.tabs.reviews') }}</a>
                            </li>
                        @endif
                    </ul>

                    <div class="tab-content">
                        @include('storefront::public.products.partials.product.tab_contents.description')
                        @if ($product->hasAnyAttribute())
                            @include('storefront::public.products.partials.product.tab_contents.additional_information')
                        @endif

                        @includeWhen(Stg::get('reviews_enabled'), 'storefront::public.products.partials.product.tab_contents.reviews')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('storefront::public.products.partials.landscape_products', [
        'title' => trans('storefront::product.related_products'),
        'products' => $relatedProducts
    ])

    @include('storefront::public.products.partials.landscape_products', [
        'title' => trans('storefront::product.you_might_also_like'),
        'products' => $upSellProducts
    ])
@endsection
