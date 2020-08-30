@extends('storefront::public.layout')

@section('title', trans('storefront::checkout.checkout'))

@push('meta')
    <meta name="cart-has-shipping-method" content="{{ $cart->hasShippingMethod() }}">
@endpush

@push('globals')
    <script>
        FleetCart.langs['storefront::checkout.please_select'] = '{{ trans("storefront::checkout.please_select") }}';
    </script>
@endpush

@section('content')
    <section class="checkout">
        <form method="POST" action="{{ route('checkout.store') }}" id="checkout-form">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-12">
                    <div class="wizard">
                        <div class="wizard-inner">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3"></div>
                            </div>

                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="address-tab active">
                                    <a href="#address" data-toggle="tab" aria-controls="step1" role="tab" data-step="1">
                                        {{ trans('storefront::checkout.address') }}

                                        <span class="round-tab"><i class="fa fa-address-card-o" aria-hidden="true"></i></span>
                                    </a>
                                </li>

                                <li role="presentation" class="disabled payment-tab">
                                    <a href="#payment" data-toggle="tab" aria-controls="step2" role="tab" data-step="2">
                                        {{ trans('storefront::checkout.payment') }}

                                        <span class="round-tab"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                                    </a>
                                </li>

                                <li role="presentation" class="disabled confirm-tab">
                                    <a href="#confirm" data-toggle="tab" aria-controls="step3" role="tab" data-step="3">
                                        {{ trans('storefront::checkout.confirm') }}

                                        <span class="round-tab"><i class="fa fa-check" aria-hidden="true"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            @include('storefront::public.checkout.partials.address')
                            @include('storefront::public.checkout.partials.payment')
                            @include('storefront::public.checkout.partials.confirm')
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </section>
@endsection

@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ Crud::version(url('themes/storefront/public/js/stripe.js')) }}"></script>
@endpush
