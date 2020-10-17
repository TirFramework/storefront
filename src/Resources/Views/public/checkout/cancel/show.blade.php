@extends('storefront::public.layout')

@section('content')
    <section class="confirmation text-center">
        <i class="fa fa-close" aria-hidden="true"></i>

        <h2>{{ trans('storefront::order_placed.your_order_has_been_canceled') }}</h2>

        <p>
            {{ trans('storefront::order_placed.order_id') }}<span> #{{ $order->id ?? null }}</span>
        </p>
    </section>
@endsection
