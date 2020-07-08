<div class="top-nav">
    <div class="container">
        <div class="top-nav-wrapper clearfix">
            <div class="top-nav-left pull-left">
                <ul class="list-inline">
{{--                    @if (count(stg::get('supported_currencies')) > 1)--}}
{{--                        <li>--}}
{{--                            <select class="top-nav-select custom-select-white" onchange="location = this.value">--}}
{{--                                @foreach (stg::get('supported_currencies') as $currency)--}}
{{--                                    <option value="{{ route('current_currency.store', ['currency' => $currency]) }}" {{ currency() === $currency ? 'selected' : '' }}>--}}
{{--                                        {{ $currency }}--}}
{{--                                    </option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </li>--}}
{{--                    @endif--}}

{{--                    @if (count(Crud::supported_locales()) > 1)--}}
{{--                        <li>--}}
{{--                            <select class="top-nav-select custom-select-white" onchange="location = this.value">--}}
{{--                                @foreach (Crud::supported_locales() as $locale => $language)--}}
{{--                                    <option value="{{ Crud::localized_url($locale) }}" {{ Crud::locale() === $locale ? 'selected' : '' }}>--}}
{{--                                        {{ $language['name'] }}--}}
{{--                                    </option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </li>--}}
{{--                    @endif--}}
                </ul>
            </div>

            <div class="top-nav-right pull-right">
                <ul class="list-inline">

                    @if (stg::get('store_phone'))
                        <li>
                            <i class="fa fa-phone-square" aria-hidden="true"></i>
                            <a class="contact-info" href="tel:{{ stg::get('store_phone') }}">{{ stg::get('store_phone') }}</a>

                        </li>
                    @endif
                    @if (stg::get('store_mobile'))
                        <li>
                            <i class="fa fa-mobile" aria-hidden="true"></i>
                            <a class="contact-info" href="tel:{{ stg::get('store_mobile') }}">{{ stg::get('store_mobile') }}</a>
                        </li>
                    @endif

                    @if (stg::get('store_email'))
                        <li>
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <span class="contact-info">{{ stg::get('store_email') }}</span>
                        </li>
                    @endif
{{--                    <li><a href="{{ route('contact.create') }}">{{ trans('storefront::contact.contact') }}</a></li>--}}

{{--                    <li>--}}
{{--                        <a href="{{ route('compare.index') }}">--}}
{{--                            {{ trans('storefront::layout.compare') }} ({{ $compareCount }})--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    @auth--}}
{{--                        <li><a href="{{ route('account.wishlist.index') }}">{{ trans('storefront::account.links.my_wishlist') }}</a></li>--}}
{{--                        <li><a href="{{ route('account.dashboard.index') }}">{{ trans('storefront::account.links.my_account') }}</a></li>--}}
{{--                    @else--}}
{{--                        <li><a href="{{ route('login') }}">{{ trans('storefront::layout.log_in') }}</a></li>--}}
{{--                    @endauth--}}
                </ul>
            </div>
        </div>
    </div>
</div>
