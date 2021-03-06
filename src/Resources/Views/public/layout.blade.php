<!DOCTYPE html>
<html lang="{{ Crud::locale()}}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            @hasSection('title')
                @yield('title') - {{ Stg::get('store_name') }}
            @else
                {{ Stg::get('store_name') }}
            @endif
        </title>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        @stack('meta')

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600|Rubik:400,500" rel="stylesheet">

        @if (Crud::is_rtl())
            <link rel="stylesheet" href="{{ Crud::version(url('themes/storefront/public/css/app.rtl.css')) }}">
            <link rel="stylesheet" href="{{ Crud::version(url('themes/storefront/public/css/custom.css')) }}">
        @else
            <link rel="stylesheet" href="{{ Crud::version(url('themes/storefront/public/css/app.css')) }}">
        @endif

        <link rel="shortcut icon" href="{{ $favicon }}" type="image/x-icon">

        @stack('styles')

        {!! Stg::get('custom_header_assets') !!}

        <script>
            window.FleetCart = {
                csrfToken: '{{ csrf_token() }}',
                stripePublishableKey: '{{ Stg::get("stripe_publishable_key") }}',
                langs: {
                    'storefront::products.loading': '{{ trans("storefront::products.loading") }}',
                },
            };
        </script>

        @stack('globals')

        @routes(['store'])

    </head>
    <body class="theme-{{ $theme }} {{ Stf::layout() }} {{ Crud::is_rtl() ? 'rtl' : 'ltr' }}">
        <!--[if lt IE 8]>
            <p>You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="main">
            <div class="wrapper">
                @include('storefront::public.partials.sidebar')
                @include('storefront::public.partials.top_nav')
                @include('storefront::public.partials.header')
                @include('storefront::public.partials.navbar')

                <div class="content-wrapper clearfix {{ request()->routeIs('cart.index') ? 'cart-page' : '' }}">
                    <div class="container">
                        @include('storefront::public.partials.breadcrumb')

                        @unless (request()->routeIs('home') || request()->routeIs('login') || request()->routeIs('register') || request()->routeIs('reset') || request()->routeIs('reset.complete'))
                            @include('storefront::public.partials.notification')
                        @endunless

                        @yield('content')
                    </div>
                </div>

                @if (Stg::get('storefront_brand_section_enabled') && $brands->isNotEmpty() && request()->routeIs('home'))
                    <section class="brands-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="brands">
                                    @foreach ($brands as $brand)
                                        <div class="col-md-3">
                                            <div class="brand-image">
                                                <img src="{{ $brand->path }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                @endif

                @include('storefront::public.partials.footer')

                <a class="scroll-top" href="#">
                    <i class="fa fa-angle-up" aria-hidden="true"></i>
                </a>
            </div>

{{--            @unless (json_decode(Cookie::get('cookie_bar_accepted')))--}}
{{--                <div class="cookie-bar-wrapper">--}}
{{--                    <div class="container">--}}
{{--                        <div class="cookie clearfix">--}}
{{--                            <div class="cookie-text">--}}
{{--                                <span>{{ trans('storefront::layout.cookie_bar_text') }}</span>--}}
{{--                            </div>--}}

{{--                            <div class="cookie-button">--}}
{{--                                <button type="submit" class="btn btn-primary btn-cookie">--}}
{{--                                    {{ trans('storefront::layout.got_it') }}--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endunless--}}
        </div>

        @include('storefront::public.partials.quick_view_modal')

        <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
        <script src="{{ Crud::version(url('themes/storefront/public/js/app.js')) }}"></script>

        @stack('scripts')

        {!! Stg::get('custom_footer_assets') !!}
    </body>
</html>
