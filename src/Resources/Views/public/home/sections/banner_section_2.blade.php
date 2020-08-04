<a href="{{ $bannerSectionTwoBanner->call_to_action_url }}" class="banner banner-lg" style="background-image: url({{ $bannerSectionTwoBanner->image }});" target="{{ $bannerSectionTwoBanner->open_in_new_window ? '_blank' : '_self' }}">
    <div class="overlay"></div>

    <div class="display-table">
        <div class="display-table-cell">
            <div class="banner-content">
                <h2 style="color:{{$bannerSectionTwoBanner->caption_1_color ?? null }}">{{ $bannerSectionTwoBanner->caption_1 }}</h2>
                <p style="color:{{$bannerSectionTwoBanner->caption_2_color ?? null}}">{{ $bannerSectionTwoBanner->caption_2 }}</p>
                <span style="color:{{$bannerSectionTwoBanner->call_to_action_color ?? null}}">
                    {{ $bannerSectionTwoBanner->call_to_action_text }}
                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                </span>
            </div>
        </div>
    </div>
</a>
