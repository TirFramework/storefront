<?php

namespace Tir\Storefront\Entities;

use Illuminate\Support\Facades\Cache;
use Tir\Setting\Facades\Stg;

class Banner
{
    public $caption_1;
    public $caption_2;
    public $call_to_action_text;
    public $call_to_action_url;
    public $open_in_new_window;
    public $image;

    public function __construct($caption_1, $caption_2, $call_to_action_text, $call_to_action_url, $open_in_new_window, $image)
    {
        $this->caption_1 = $caption_1;
        $this->caption_2 = $caption_2;
        $this->call_to_action_text = $call_to_action_text;
        $this->call_to_action_url = $call_to_action_url;
        $this->open_in_new_window = $open_in_new_window;
        $this->image = $image;
    }

    public static function allForSliderBanners()
    {
        return [
            1 => self::findByName('storefront_slider_banner_1'),
            2 => self::findByName('storefront_slider_banner_2'),
        ];
    }

    public static function allForSectionOne()
    {
        return [
            1 => self::findByName('storefront_banner_section_1_banner_1'),
            2 => self::findByName('storefront_banner_section_1_banner_2'),
            3 => self::findByName('storefront_banner_section_1_banner_3'),
        ];
    }

    public static function allForSectionThree()
    {
        return [
            1 => self::findByName('storefront_banner_section_3_banner_1'),
            2 => self::findByName('storefront_banner_section_3_banner_2'),
        ];
    }

    public static function findByName($name)
    {
        return new self(
            Stg::get("{$name}_caption_1"),
            Stg::get("{$name}_caption_2"),
            Stg::get("{$name}_call_to_action_text"),
            Stg::get("{$name}_call_to_action_url"),
            Stg::get("{$name}_open_in_new_window"),
            Stg::get("{$name}_image")
        );
    }


}
