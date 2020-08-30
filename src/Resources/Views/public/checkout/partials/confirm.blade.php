<div id="confirm" class="tab-pane" role="tabpanel">
    <div class="box-wrapper confirm clearfix">
        <div class="box-header">
            <h4>{{ trans('storefront::checkout.tabs.confirm.item_list') }}</h4>
        </div>

        <div class="order-list cart-list">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        @foreach ($cart->items() as $cartItem)
                            <tr>
                                <td>
                                    @if (! $cartItem->product->image)
                                        <div class="image-placeholder">
                                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                                        </div>
                                    @else
                                        <div class="image-holder">
                                            <img src="{{ $cartItem->product->image }}">
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    <h5>
                                        <a href="{{ route('products.show', $cartItem->product->slug) }}">{{ $cartItem->product->name }}</a>
                                    </h5>

                                    <div class="option">
                                        @foreach ($cartItem->options as $option)
                                            <span>{{ $option->name }}: <span>{{ $option->values->implode('label', ', ') }}</span></span>
                                        @endforeach
                                    </div>
                                </td>

                                <td>
                                    <label>{{ trans('storefront::checkout.tabs.confirm.price') }}:</label>
                                    <span>{{ $cartItem->unitPrice()->convertToCurrentCurrency()->format() }}</span>
                                </td>

                                <td>
                                    <label>{{ trans('storefront::checkout.tabs.confirm.quantity') }}:</label>
                                    <span>{{ $cartItem->qty }}</span>
                                </td>

                                <td>
                                    <label>{{ trans('storefront::checkout.tabs.confirm.total') }}:</label>
                                    <span>{{ $cartItem->total()->convertToCurrentCurrency()->format() }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

{{--        <button type="button" class="btn btn-primary next-step pull-right">--}}
{{--            {{ trans('storefront::checkout.continue') }}--}}
{{--        </button>--}}

        <button type="button" class="btn btn-default prev-step pull-right">
            {{ trans('storefront::checkout.back') }}
        </button>

    </div>

    @include('storefront::public.checkout.partials.payment_instructions', ['paymentMethod' => 'bank_transfer'])
    @include('storefront::public.checkout.partials.payment_instructions', ['paymentMethod' => 'check_payment'])
    <div class="">
        <div class="order-review">
            <div class="cart-total">
                <h3>{{ trans('storefront::cart.cart_totals') }}</h3>

                <span class="item-amount">
                                {{ trans('storefront::cart.subtotal') }}
                                <span>{{ $cart->subTotal()->convertToCurrentCurrency()->format() }}</span>
                            </span>

                @if ($cart->hasAvailableShippingMethod())
                    <div class="available-shipping-methods">
                        <span>{{ trans('storefront::cart.shipping_method') }}</span>

                        <div class="form-group">
                            @foreach ($cart->availableShippingMethods() as $name => $shippingMethod)
                                <div class="radio">
                                    <input type="radio" name="shipping_method" class="shipping-method" value="{{ $name }}" id="{{ $name }}" {{ $cart->shippingMethod()->name() === $shippingMethod->name || $loop->first ? 'checked' : '' }}>
                                    <label for="{{ $name }}">{{ $shippingMethod->label }}</label>
                                    <span class="pull-right">{{ $shippingMethod->cost->convertToCurrentCurrency()->format() }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    @if ($errors->has('shipping_method'))
                        <span class="error-message text-center">
                                        {!! $errors->first('shipping_method', '<span class="help-block">:message</span>') !!}
                                    </span>
                    @endif
                @endif

                @if ($cart->hasCoupon())
                    <span class="item-amount">
                                    {{ trans('storefront::cart.coupon') }} (<span class="coupon-code">{{ $cart->coupon()->code() }}</span>)
                                    <span id="coupon-value">&#8211;{{ $cart->coupon()->value()->convertToCurrentCurrency()->format() }}</span>
                                </span>
                @endif

                <div id="taxes">
                    @foreach ($cart->taxes() as $tax)
                        <span class="item-amount">
                                        {{ $tax->name() }}
                                        <span>{{ $tax->amount()->convertToCurrentCurrency()->format() }}</span>
                                    </span>
                    @endforeach
                </div>

                <span class="total">
                                {{ trans('storefront::cart.total') }}
                                <span id="total-amount">{{ $cart->total()->convertToCurrentCurrency()->format() }}</span>
                            </span>

                <div id="stripe-payment">
                    <div id="card-element">
                        {{-- A Stripe Element will be inserted here. --}}
                    </div>
                </div>

                @if ($cart->hasNoAvailableShippingMethod())
                    <span class="error-message text-center">{{ trans('storefront::cart.no_shipping_method_is_available') }}</span>
                @endif

                <div class="checkout-terms checkbox text-center">
                    <input type="checkbox" name="terms_and_conditions" id="terms-and-conditions">

                    <label for="terms-and-conditions">
                        {{ trans('storefront::checkout.i_agree_to_the') }} <a href="{{ $termsPageURL }}">{{ trans('storefront::checkout.terms_and_conditions') }}</a>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary btn-checkout {{ $cart->hasNoAvailableShippingMethod() ? 'disabled' : '' }}" data-loading disabled>
                    {{ trans('storefront::checkout.place_order') }}
                </button>
            </div>
        </div>
    </div>

</div>

