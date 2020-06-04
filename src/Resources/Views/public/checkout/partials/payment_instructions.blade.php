@if (Stg::get("{$paymentMethod}_enabled"))
    <div class="box-wrapper payment-instructions hide {{ $paymentMethod }}">
        <div class="box-header">
            <h4>{{ trans('storefront::checkout.tabs.confirm.payment_instructions') }}</h4>
        </div>

        <div class="instruction">
            <p>{!! Stg::get("{$paymentMethod}_instructions") !!}</p>
        </div>
    </div>
@endif
