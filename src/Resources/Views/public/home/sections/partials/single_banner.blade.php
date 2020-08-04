<a href="{{ $banner->call_to_action_url }}" class="banner {{ $class ?? '' }}" style="background-image: url({{ $banner->image }});" target="{{ $banner->open_in_new_window ? '_blank' : '_self' }}">
    <div class="overlay"></div>

    <div class="display-table">
        <div class="display-table-cell">
            <div class="banner-content">
                <h3 style="color:{{$banner->caption_1_color ?? null}}">{{ $banner->caption_1 }}</h3>
                <p style="color:{{$banner->caption_2_color ?? null}}">{{ $banner->caption_2 }}</p>
                <span style="color:{{$banner->call_to_action_color ?? null}}">
                    {{ $banner->call_to_action_text }}
                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                </span>
            </div>
        </div>
    </div>
</a>
