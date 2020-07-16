<div class="home-slider"
    data-autoplay="{{ $slider->autoplay }}"
    data-autoplay-speed="{{ $slider->autoplay_speed }}"
    data-arrows="{{ $slider->arrows }}"
>
    @foreach ($slider->slides as $slide)
        <div class="slide">
            <div class="slider-image" style="background-image:url({{$slide->file}});"></div>

            <div class="display-table">
                <div class="display-table-cell">
                    <div class="col-md-9 col-md-offset-1 col-sm-10 col-sm-offset-1">
                        <div class="slider-content clearfix">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    @unless (is_null($slide->caption_1))
                                        <div class="caption caption-md"
                                            data-delay="{{ $slide->options['caption_1']['delay'] }}ms"
                                            data-effect="{{ $slide->options['caption_1']['effect'] }}"
                                             style="color:{{$slide->options['caption_1']['color']}}"
                                        >
                                            {{ $slide->caption_1 }}
                                        </div>
                                    @endunless

                                    @unless (is_null($slide->caption_2))
                                        <div class="caption caption-lg"
                                            data-delay="{{ $slide->options['caption_2']['delay'] }}ms"
                                            data-effect="{{ $slide->options['caption_2']['effect'] }}"
                                             style="color:{{$slide->options['caption_2']['color']}}"
                                        >
                                            {{ $slide->caption_2 }}
                                        </div>
                                    @endunless

                                    @unless (is_null($slide->caption_3))
                                        <div class="caption caption-sm"
                                            data-delay="{{ $slide->options['caption_3']['delay'] }}ms"
                                            data-effect="{{ $slide->options['caption_3']['effect'] }}"
                                             style="color:{{$slide->options['caption_3']['color']}}"
                                        >
                                            {{ $slide->caption_3 }}
                                        </div>
                                    @endunless

                                    @unless (is_null($slide->call_to_action_text))
                                        <a href="{{ $slide->call_to_action_url }}"
                                            class="btn-slider btn btn-primary animate"
                                            target="{{ $slide->options['call_to_action']['target'] ?? '_self' }}"
                                            data-delay="{{ $slide->options['call_to_action']['delay'] }}ms"
                                            data-effect="{{ $slide->options['call_to_action']['effect'] }}"
                                        >
                                            {{ $slide->call_to_action_text }}
                                        </a>
                                    @endunless
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

