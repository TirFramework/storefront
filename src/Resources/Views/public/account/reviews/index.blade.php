@extends('storefront::public.account.layout')

@section('title', trans('storefront::account.links.my_reviews'))

@section('account_breadcrumb')
    <li class="active">{{ trans('storefront::account.links.my_reviews') }}</li>
@endsection

@section('content_right')
    <div class="index-table">
        @if ($reviews->isEmpty())
            <h3 class="text-center">{{ trans('storefront::account.reviews.no_reviews') }}</h3>
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>{{ trans('storefront::account.reviews.product') }}</th>
                            <th>{{ trans('storefront::account.reviews.rating') }}</th>
                            <th>{{ trans('storefront::account.reviews.date') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($reviews as $review)
                            <tr>
                                <td>
                                    @if (! isset($review->product->image))
                                        <div class="image-placeholder">
                                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                                        </div>
                                    @else
                                        <div class="image-holder">
                                            <img src="{{ $review->product->image }}">
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('products.show', ['slug' => $review->product->slug]) }}">{{ $review->product->name }}</a>
                                </td>

                                <td>
                                    @include('storefront::public.products.partials.product.rating', ['rating' => $review->rating])
                                </td>

                                <td>
                                    {{ (config('app.locale') == 'fa') ? jDate($review->created_at)->ago() : $review->created_at}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    @if ($reviews->isNotEmpty())
        <div class="pull-right">
            {!! $reviews->links() !!}
        </div>
    @endif
@endsection
