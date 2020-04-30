@extends('storefront::public.layout')

@section('title', Stg::get('store_tagline'))

@section('content')
    @unless (is_null($slider))
        @if (Stf::layout() === 'default')
            <div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3">
                <div class="row">
                    @include('storefront::public.home.sections.slider')
                </div>
            </div>
            <div class="clearfix"></div>
        @elseif (Stf::layout() === 'slider_with_banners')
            <div class="row">
                <div class="col-md-9">
                    @include('storefront::public.home.sections.slider')
                </div>

                <div class="col-md-3 hidden-sm hidden-xs">
                    @include('storefront::public.home.sections.slider_banners')
                </div>
            </div>
        @endif
    @endunless

    @include('storefront::public.partials.notification')

    @if (Stg::get('storefront_features_section_enabled'))
        @include('storefront::public.home.sections.features')
    @endif

{{--    @if (Stg::get('storefront_banner_section_1_enabled'))--}}
{{--        @include('storefront::public.home.sections.banner_section_1')--}}
{{--    @endif--}}

    @if (Stg::get('storefront_product_carousel_section_enabled'))
        @include('storefront::public.home.sections.product_carousel', [
            'title' => Stg::get('storefront_product_carousel_section_title'),
            'products' => $carouselProducts
        ])
    @endif

    @if (Stg::get('storefront_recent_products_section_enabled'))
        @include('storefront::public.home.sections.recent_products')
    @endif

    @if (Stg::get('storefront_banner_section_2_enabled'))
        @include('storefront::public.home.sections.banner_section_2')
    @endif

    @if (Stg::get('storefront_three_column_vertical_product_carousel_section_enabled'))
        @include('storefront::public.home.sections.three_column_vertical_product_carousel')
    @endif

    @if (Stg::get('storefront_landscape_products_section_enabled'))
        @include('storefront::public.products.partials.landscape_products', [
            'title' => Stg::get('storefront_landscape_products_section_title'),
            'products' => $landscapeProducts
        ])
    @endif

    @if (Stg::get('storefront_banner_section_3_enabled'))
        @include('storefront::public.home.sections.banner_section_3')
    @endif

    @if (Stg::get('storefront_product_tabs_section_enabled'))
        @include('storefront::public.home.sections.product_tabs')
    @endif

    @if (Stg::get('storefront_two_column_product_carousel_section_enabled'))
        @include('storefront::public.home.sections.two_column_product_carousel')
    @endif

{{--    @if (Stg::get('storefront_recently_viewed_section_enabled'))--}}
{{--        @include('storefront::public.products.partials.landscape_products', [--}}
{{--            'title' => Stg::get('storefront_recently_viewed_section_title'),--}}
{{--            'products' => $recentlyViewedProducts--}}
{{--        ])--}}
{{--    @endif--}}
@endsection
