<div class="col-lg-4 col-md-5 col-sm-5 col-xs-7">
    <div class="product-image">
        <div class="base-image">
            @if (! isset($product->image) )
                <div class="image-placeholder">
                    <i class="fa fa-picture-o"></i>
                </div>
            @else
                <a class="base-image-inner" href="{{ $product->image }}">
                    <img src="{{ $product->image }}">
                    <span><i class="fa fa-search-plus" aria-hidden="true"></i></span>
                </a>
            @endif

            @foreach ($product->additionalImages as $additionalImage)
                @if (! isset($product->image))
                    <div class="image-placeholder">
                        <i class="fa fa-picture-o"></i>
                    </div>
                @else
                    <a class="base-image-inner" href="{{$additionalImage['url']}}">
                        <img src="{{$additionalImage['url']}}">
                        <span><i class="fa fa-search-plus" aria-hidden="true"></i></span>
                    </a>
                @endif
            @endforeach
        </div>

        <div class="additional-image">
            @if (! isset($product->image))
                <div class="image-placeholder">
                    <i class="fa fa-picture-o"></i>
                </div>
            @else
                <div class="thumb-image">
                    <img src="{{$product->image}}">
                </div>
            @endif

            @foreach ($product->additionalImages as $additionalImage)
                @if (! isset($additionalImage))
                    <div class="image-placeholder">
                        <i class="fa fa-picture-o"></i>
                    </div>
                @else
                    <div class="thumb-image">
                        <img src="{{$additionalImage['url']}}">
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
