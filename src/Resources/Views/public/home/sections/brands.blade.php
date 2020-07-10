@if (isset($brands))
    <section class="product-slider-wrapper clearfix">
        <div class="section-header">
            <h3>{{ $title }}</h3>
        </div>

        <div class="row">
            <div class="product-slider slick-arrow separator clearfix">
                @foreach ($brands as $brand)
                    @if(isset($brand->logo))
                    <div class="col-md-1">
                        <img src="{{$brand->logo}}" alt="{{$brand->name}}" height="60px" style="margin: auto">
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endif
