<?php

namespace Tir\Storefront\Entities;

use Illuminate\Support\Facades\Cache;
use Tir\Crud\Support\Eloquent\CrudModel;
use Tir\Crud\Support\Eloquent\Translatable;
use Tir\Crud\Support\Facades\Crud;
use Tir\Menu\Entities\Menu;
use Tir\Page\Entities\Page;
use Tir\Slider\Entities\Slider;
use Tir\Store\Product\Entities\Product;

class StorefrontSetting extends CrudModel
{
    //Additional trait insert here

    use Translatable;

    /**
     * The attribute show route name
     * and we use in fieldTypes and controllers
     *
     * @var string
     */
    public static $routeName = 'storefront';

    public $table = 'settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['key', 'is_translatable', 'plain_value', 'module'];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_translatable' => 'boolean',
        'plain_value'     => 'array'

    ];


    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatedAttributes = ['value'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];


    /**
     * This function return array for validation
     *
     * @return array
     */
    public function getValidation()
    {
        return [
            'key'         => 'required',
            'plain_value' => 'required'
        ];
    }


    /**
     * This function return an object of field
     * and we use this for generate admin panel page
     * @return Object
     */
    public function getFields()
    {


        $fields = [
            [
                'name'    => 'basic_setting',
                'type'    => 'group',
                'visible' => 'ce',
                'tabs'    => [
                    [
                        'name'    => 'general_setting',
                        'type'    => 'tab',
                        'visible' => 'ce',
                        'fields'  => [
                            [
                                'name'    => 'id',
                                'type'    => 'text',
                                'visible' => 'io',
                            ],
                            [
                                'name'    => 'storefront_theme',
                                'type'    => 'select',
                                'data'    => [
                                                'black' => trans('storefront::panel.black'),
                                                'blue' => trans('storefront::panel.blue'),
                                                'marrs-green' => trans('storefront::panel.marrs-green'),
                                                'navy-blue' => trans('storefront::panel.navy-blue'),
                                                'pink' => trans('storefront::panel.pink'),
                                                'red' => trans('storefront::panel.red'),
                                                'sky-blue' => trans('storefront::panel.sky-blue'),
                                                'violet' => trans('storefront::panel.violet')
                                            ],
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_mail_theme',
                                'type'    => 'select',
                                'data'    => ['blue' => 'Blue', 'red' => 'red'],
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_layout',
                                'type'    => 'select',
                                'data'    => [
                                                'default' => 'Default',
                                                'slider_with_banners' => 'Slider With Banners',
                                                'wide' => 'Wide'
                                             ],
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'translatable[storefront_slider]',
                                'display' => 'storefront_slider',
                                'type'    => 'select',
                                'data'    => Slider::select('*')->get()->pluck('name', 'id'),
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_terms_page',
                                'type'    => 'select',
                                'data'    => Page::select('*')->get()->pluck('name', 'id'),
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_privacy_page',
                                'type'    => 'select',
                                'data'    => Page::select('*')->get()->pluck('name', 'id'),
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'translatable[storefront_footer_address]',
                                'display' => 'storefront_footer_address',
                                'type'    => 'text',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'translatable[storefront_copyright_text]',
                                'display' => 'storefront_copyright_text',
                                'type'    => 'text',
                                'visible' => 'ice',
                            ],


                        ]
                    ],
                    [
                        'name'    => 'logo',
                        'type'    => 'tab',
                        'visible' => 'ce',
                        'fields'  => [

                            [
                                'name'    => 'storefront_favicon',
                                'type'    => 'image',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'translatable[storefront_header_logo]',
                                'display' => 'storefront_header_logo',
                                'type'    => 'image',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'translatable[storefront_footer_logo]',
                                'display' => 'storefront_footer_logo',
                                'type'    => 'image',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'translatable[storefront_mail_logo]',
                                'display' => 'storefront_mail_logo',
                                'type'    => 'image',
                                'visible' => 'ce',
                            ],

                        ]
                    ],
                    [
                        'name'    => 'menu',
                        'type'    => 'tab',
                        'visible' => 'ce',
                        'fields'  => [

                            [
                                'name'    => 'translatable[storefront_primary_menu]',
                                'display' => 'storefront_primary_menu',
                                'type'    => 'select',
                                'data'    => Menu::select('*')->get()->pluck('name', 'id'),
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'translatable[storefront_category_menu_title]',
                                'display' => 'storefront_category_menu_title',
                                'type'    => 'text',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'translatable[storefront_category_menu]',
                                'display' => 'storefront_category_menu',
                                'type'    => 'select',
                                'data'    => Menu::select('*')->get()->pluck('name', 'id'),
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'translatable[storefront_footer_menu_title]',
                                'display' => 'storefront_footer_menu_title',
                                'type'    => 'text',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'translatable[storefront_footer_menu]',
                                'display' => 'storefront_footer_menu',
                                'type'    => 'select',
                                'data'    => Menu::select('*')->get()->pluck('name', 'id'),
                                'visible' => 'ce',
                            ],
                        ]
                    ],
                    [
                        'name'    => 'social_links',
                        'type'    => 'tab',
                        'visible' => 'ce',
                        'fields'  => [
                            [
                                'name'    => 'storefront_fb_link',
                                'type'    => 'text',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'storefront_twitter_link',
                                'type'    => 'text',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'storefront_instagram_link',
                                'type'    => 'text',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'storefront_pinterest_link',
                                'type'    => 'text',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'storefront_google_plus_link',
                                'type'    => 'text',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'storefront_youtube_link',
                                'type'    => 'text',
                                'visible' => 'ce',
                            ],

                        ]
                    ]
                ]
            ],
            [
                'name'    => 'home_page_sections',
                'type'    => 'group',
                'visible' => 'ce',
                'tabs'    => [
                    [
                        'name'    => 'slider_banners',
                        'type'    => 'tab',
                        'visible' => 'ce',
                        'fields'  => [
                            [
                                'name'    => 'banner_1',
                                'type'    => 'blank',
                                'value'   => '<h5>'.trans('storefront::panel.banner'). '1 </h5><hr/>',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'translatable[storefront_slider_banner_1_image]',
                                'display' => 'image',
                                'type'    => 'image',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'translatable[storefront_slider_banner_1_caption_1]',
                                'display' => 'caption_1',
                                'type'    => 'text',
                                'col'     => 'col-3',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_slider_banner_1_caption_1_color',
                                'display' => 'caption_1_color',
                                'type'    => 'text',
                                'col'     => 'col-3',
                                'visible' => 'e',
                            ],
                            [
                                'name'    => 'translatable[storefront_slider_banner_1_caption_2]',
                                'display' => 'caption_2',
                                'type'    => 'text',
                                'col'     => 'col-3',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_slider_banner_1_caption_2_color',
                                'display' => 'caption_2_color',
                                'type'    => 'text',
                                'col'     => 'col-3',
                                'visible' => 'e',
                            ],
                            [
                                'name'    => 'translatable[storefront_slider_banner_1_call_to_action_text]',
                                'display' => 'call_to_action_text',
                                'type'    => 'text',
                                'col'     => 'col-3',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_slider_banner_1_call_to_action_url',
                                'display' => 'call_to_action_url',
                                'type'    => 'text',
                                'col'     => 'col-3',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_slider_banner_1_open_in_new_window',
                                'display' => 'open_in_new_window',
                                'type'    => 'select',
                                'data'    => ['1' => 'Yes', '0' => 'No'],
                                'col'     => 'col-3',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_slider_banner_1_call_to_action_color',
                                'display' => 'call_to_action_color',
                                'type'    => 'text',
                                'col'     => 'col-3',
                                'visible' => 'e',
                            ],
                            [
                                'name'    => 'banner_2',
                                'type'    => 'blank',
                                'value'   => '<h5>'.trans('storefront::panel.banner'). '2 </h5><hr/>',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'translatable[storefront_slider_banner_2_image]',
                                'display' => 'image',
                                'type'    => 'image',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'translatable[storefront_slider_banner_2_caption_1]',
                                'display' => 'caption_1',
                                'type'    => 'text',
                                'col'     => 'col-3',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_slider_banner_2_caption_1_color',
                                'display' => 'caption_1_color',
                                'type'    => 'text',
                                'col'     => 'col-3',
                                'visible' => 'e',
                            ],
                            [
                                'name'    => 'translatable[storefront_slider_banner_2_caption_2]',
                                'display' => 'caption_2',
                                'type'    => 'text',
                                'col'     => 'col-3',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_slider_banner_2_caption_2_color',
                                'display' => 'caption_2_color',
                                'type'    => 'text',
                                'col'     => 'col-3',
                                'visible' => 'e',
                            ],
                            [
                                'name'    => 'translatable[storefront_slider_banner_2_call_to_action_text]',
                                'display' => 'call_to_action_text',
                                'type'    => 'text',
                                'col'     => 'col-3',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_slider_banner_2_call_to_action_url',
                                'display' => 'call_to_action_url',
                                'type'    => 'text',
                                'col'     => 'col-3',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_slider_banner_2_call_to_action_color',
                                'display' => 'call_to_action_color',
                                'type'    => 'text',
                                'col'     => 'col-3',
                                'visible' => 'e',
                            ],
                            [
                                'name'    => 'storefront_slider_banner_2_open_in_new_window',
                                'display' => 'open_in_new_window',
                                'type'    => 'select',
                                'data'    => ['1' => 'Yes', '0' => 'No'],
                                'col'     => 'col-3',
                                'visible' => 'ice',
                            ],
                        ]
                    ],
                    [
                        'name'    => 'features',
                        'type'    => 'tab',
                        'visible' => 'ce',
                        'fields'  => [
                            [
                                'name'    => 'storefront_features_section_enabled',
                                'display' => 'section_status',
                                'type'    => 'select',
                                'data'    => ['1' => 'Enable', '0' => 'Disable'],
                                'col'     => 'col-4',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'feature_1',
                                'type'    => 'blank',
                                'value'   => '<h5>'.trans('storefront::panel.feature'). ' 1</h5><hr/>',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'storefront_feature_1_icon',
                                'display' => 'icon',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'translatable[storefront_feature_1_title]',
                                'display' => 'title',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'translatable[storefront_feature_1_subtitle]',
                                'display' => 'subtitle',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'feature_2',
                                'type'    => 'blank',
                                'value'   => '<h5>'.trans('storefront::panel.feature'). ' 2</h5><hr/>',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'storefront_feature_2_icon',
                                'display' => 'icon',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'translatable[storefront_feature_2_title]',
                                'display' => 'title',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'translatable[storefront_feature_2_subtitle]',
                                'display' => 'subtitle',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'feature_3',
                                'type'    => 'blank',
                                'value'   => '<h5>'.trans('storefront::panel.feature'). ' 3</h5><hr/>',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'storefront_feature_3_icon',
                                'display' => 'icon',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'translatable[storefront_feature_3_title]',
                                'display' => 'title',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'translatable[storefront_feature_3_subtitle]',
                                'display' => 'subtitle',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'feature_4',
                                'type'    => 'blank',
                                'value'   => '<h5>'.trans('storefront::panel.feature'). ' 4</h5><hr/>',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'storefront_feature_4_icon',
                                'display' => 'icon',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'translatable[storefront_feature_4_title]',
                                'display' => 'title',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'translatable[storefront_feature_4_subtitle]',
                                'display' => 'subtitle',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ce',
                            ],
                        ]
                    ],
                    [
                        'name'    => 'banner_section_1',
                        'type'    => 'tab',
                        'visible' => 'ce',
                        'fields'  => [
                            [
                                'name'    => 'storefront_banner_section_1_enabled',
                                'display' => 'section_status',
                                'type'    => 'select',
                                'data'    => ['1' => 'Enable', '0' => 'Disable'],
                                'col'     => 'col-4',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'banner_1',
                                'type'    => 'blank',
                                'value'   => '<h5>'.trans('storefront::panel.banner'). '1 </h5><hr/>',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_1_banner_1_image]',
                                'display' => 'image',
                                'type'    => 'image',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_1_banner_1_caption_1]',
                                'display' => 'caption_1',
                                'type'    => 'text',
                                'col'     => 'col-3',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_banner_section_1_banner_1_caption_1_color',
                                'display' => 'caption_1_color',
                                'type'    => 'text',
                                'col'     => 'col-3',
                                'visible' => 'e',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_1_banner_1_caption_2]',
                                'display' => 'caption_2',
                                'type'    => 'text',
                                'col'     => 'col-3',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_banner_section_1_banner_1_caption_2_color',
                                'display' => 'caption_2_color',
                                'type'    => 'text',
                                'col'     => 'col-3',
                                'visible' => 'e',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_1_banner_1_call_to_action_text]',
                                'display' => 'call_to_action_text',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_banner_section_1_banner_1_call_to_action_url',
                                'display' => 'call_to_action_url',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_banner_section_1_banner_1_open_in_new_window',
                                'display' => 'open_in_new_window',
                                'type'    => 'select',
                                'data'    => ['1' => 'Yes', '0' => 'No'],
                                'col'     => 'col-4',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'banner_2',
                                'type'    => 'blank',
                                'value'   => '<h5>'.trans('storefront::panel.banner'). '2 </h5><hr/>',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_1_banner_2_image]',
                                'display' => 'image',
                                'type'    => 'image',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_1_banner_2_caption_1]',
                                'display' => 'caption_2',
                                'type'    => 'text',
                                'col'     => 'col-6',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_1_banner_2_caption_2]',
                                'display' => 'caption_2',
                                'type'    => 'text',
                                'col'     => 'col-6',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_1_banner_2_call_to_action_text]',
                                'display' => 'call_to_action_text',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_banner_section_1_banner_2_call_to_action_url',
                                'display' => 'call_to_action_url',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_banner_section_1_banner_2_open_in_new_window',
                                'display' => 'open_in_new_window',
                                'type'    => 'select',
                                'data'    => ['1' => 'Yes', '0' => 'No'],
                                'col'     => 'col-4',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'banner_3',
                                'type'    => 'blank',
                                'value'   => '<h5>'.trans('storefront::panel.banner'). '3 </h5><hr/>',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_1_banner_3_image]',
                                'display' => 'image',
                                'type'    => 'image',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_1_banner_3_caption_1]',
                                'display' => 'caption_2',
                                'type'    => 'text',
                                'col'     => 'col-6',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_1_banner_3_caption_2]',
                                'display' => 'caption_2',
                                'type'    => 'text',
                                'col'     => 'col-6',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_1_banner_3_call_to_action_text]',
                                'display' => 'call_to_action_text',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_banner_section_1_banner_3_call_to_action_url',
                                'display' => 'call_to_action_url',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_banner_section_1_banner_3_open_in_new_window',
                                'display' => 'open_in_new_window',
                                'type'    => 'select',
                                'data'    => ['1' => 'Yes', '0' => 'No'],
                                'col'     => 'col-4',
                                'visible' => 'ice',
                            ],
                        ]
                    ],
                    [
                        'name'    => 'product_carousel',
                        'type'    => 'tab',
                        'visible' => 'ce',
                        'fields'  => [
                            [
                                'name'    => 'storefront_product_carousel_section_enabled',
                                'display' => 'section_status',
                                'type'    => 'select',
                                'data'    => ['1' => 'Enable', '0' => 'Disable'],
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'translatable[storefront_product_carousel_section_title]',
                                'display' => 'section_title',
                                'type'    => 'text',
                                'visible' => 'ice',
                            ],
                            [
                                'name'     => 'storefront_product_carousel_section_products',
                                'display'  => 'products',
                                'type'     => 'select',
                                'data'     => Product::all()->pluck('name', 'id'),
                                'multiple' => true,
                                'visible'  => 'ce',
                            ]

                        ]
                    ],
                    [
                        'name'    => 'recent_products',
                        'type'    => 'tab',
                        'visible' => 'ce',
                        'fields'  => [
                            [
                                'name'    => 'storefront_recent_products_section_enabled',
                                'display' => 'section_status',
                                'type'    => 'select',
                                'data'    => ['1' => 'Enable', '0' => 'Disable'],
                                'visible' => 'e',
                            ],
                            [
                                'name'    => 'translatable[storefront_recent_products_section_title]',
                                'display' => 'section_title',
                                'type'    => 'text',
                                'visible' => 'e',
                            ],
                            [
                                'name'    => 'storefront_recent_products_section_total_products',
                                'display' => 'total_products',
                                'type'    => 'number',
                                'visible' => 'e',
                            ],
                        ]
                    ],
                    [
                        'name'    => 'banner_section_2',
                        'type'    => 'tab',
                        'visible' => 'ce',
                        'fields'  => [
                            [
                                'name'    => 'storefront_banner_section_2_enabled',
                                'display' => 'section_status',
                                'type'    => 'select',
                                'data'    => ['1' => 'Enable', '0' => 'Disable'],
                                'visible' => 'e',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_2_banner_image]',
                                'display' => 'image',
                                'type'    => 'image',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_2_banner_caption_1]',
                                'display' => 'caption_1',
                                'type'    => 'text',
                                'col'     => 'col-6',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_2_banner_caption_2]',
                                'display' => 'caption_2',
                                'type'    => 'text',
                                'col'     => 'col-6',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_2_banner_call_to_action_text]',
                                'display' => 'call_to_action_text',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_banner_section_2_banner_call_to_action_url',
                                'display' => 'call_to_action_url',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_banner_section_2_banner_open_in_new_window',
                                'display' => 'open_in_new_window',
                                'type'    => 'select',
                                'data'    => ['1' => 'Yes', '0' => 'No'],
                                'col'     => 'col-4',
                                'visible' => 'ice',
                            ]

                        ]
                    ],
                    [
                        'name'    => 'three_column_vertical_product_carousel',
                        'type'    => 'tab',
                        'visible' => 'ce',
                        'fields'  => [
                            [
                                'name'    => 'storefront_three_column_vertical_product_carousel_section_enabled',
                                'display' => 'section_status',
                                'type'    => 'select',
                                'data'    => ['1' => 'Enable', '0' => 'Disable'],
                                'visible' => 'e',
                            ],
                            [
                                'name'    => 'column_1',
                                'type'    => 'blank',
                                'value'   => '<h5>'.trans('storefront::panel.column'). ' 1</h5><hr/>',
                                'visible' => 'e'
                            ],
                            [
                                'name'    => 'translatable[storefront_three_column_vertical_product_carousel_section_column_1_title]',
                                'display' => 'column_title',
                                'type'    => 'text',
                                'visible' => 'e',
                            ],
                            [
                                'name'     => 'storefront_three_column_vertical_product_carousel_section_column_1_products',
                                'display'  => 'products',
                                'type'     => 'select',
                                'data'     => Product::all()->pluck('name', 'id'),
                                'multiple' => true,
                                'visible'  => 'ce',
                            ],
                            [
                                'name'    => 'column_2',
                                'type'    => 'blank',
                                'value'   => '<h5>'.trans('storefront::panel.column'). ' 2</h5><hr/>',
                                'visible' => 'e'
                            ],
                            [
                                'name'    => 'translatable[storefront_three_column_vertical_product_carousel_section_column_2_title]',
                                'display' => 'column_title',
                                'type'    => 'text',
                                'visible' => 'e',
                            ],
                            [
                                'name'     => 'storefront_three_column_vertical_product_carousel_section_column_2_products',
                                'display'  => 'products',
                                'type'     => 'select',
                                'data'     => Product::all()->pluck('name', 'id'),
                                'multiple' => true,
                                'visible'  => 'ce',
                            ],
                            [
                                'name'    => 'column_3',
                                'type'    => 'blank',
                                'value'   => '<h5>'.trans('storefront::panel.column'). ' 3</h5><hr/>',
                                'visible' => 'e'
                            ],
                            [
                                'name'    => 'translatable[storefront_three_column_vertical_product_carousel_section_column_3_title]',
                                'display' => 'column_title',
                                'type'    => 'text',
                                'visible' => 'e',
                            ],
                            [
                                'name'     => 'storefront_three_column_vertical_product_carousel_section_column_3_products',
                                'display'  => 'products',
                                'type'     => 'select',
                                'data'     => Product::all()->pluck('name', 'id'),
                                'multiple' => true,
                                'visible'  => 'ce',
                            ],

                        ]
                    ],
                    [
                        'name'    => 'landscape_products',
                        'type'    => 'tab',
                        'visible' => 'ce',
                        'fields'  => [
                            [
                                'name'    => 'storefront_landscape_products_section_enabled',
                                'display' => 'section_status',
                                'type'    => 'select',
                                'data'    => ['1' => 'Enable', '0' => 'Disable'],
                                'visible' => 'e',
                            ],
                            [
                                'name'    => 'translatable[storefront_landscape_products_section_title]',
                                'display' => 'column_title',
                                'type'    => 'text',
                                'visible' => 'e',
                            ],
                            [
                                'name'     => 'storefront_landscape_products_section_products',
                                'display'  => 'products',
                                'type'     => 'select',
                                'data'     => Product::all()->pluck('name', 'id'),
                                'multiple' => true,
                                'visible'  => 'ce',
                            ]

                        ]
                    ],
                    [
                        'name'    => 'banner_section_3',
                        'type'    => 'tab',
                        'visible' => 'ce',
                        'fields'  => [
                            [
                                'name'    => 'storefront_banner_section_3_enabled',
                                'display' => 'section_status',
                                'type'    => 'select',
                                'data'    => ['1' => 'Enable', '0' => 'Disable'],
                                'col'     => 'col-4',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'banner_1',
                                'type'    => 'blank',
                                'value'   => '<h5>'.trans('storefront::panel.banner'). ' 1</h5><hr/>',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_3_banner_1_image]',
                                'display' => 'image',
                                'type'    => 'image',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_3_banner_1_caption_1]',
                                'display' => 'caption_1',
                                'type'    => 'text',
                                'col'     => 'col-6',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_3_banner_1_caption_2]',
                                'display' => 'caption_2',
                                'type'    => 'text',
                                'col'     => 'col-6',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_3_banner_1_call_to_action_text]',
                                'display' => 'call_to_action_text',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_banner_section_1_banner_3_call_to_action_url',
                                'display' => 'call_to_action_url',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_banner_section_1_banner_3_open_in_new_window',
                                'display' => 'open_in_new_window',
                                'type'    => 'select',
                                'data'    => ['1' => 'Yes', '0' => 'No'],
                                'col'     => 'col-4',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'banner_2',
                                'type'    => 'blank',
                                'value'   => '<h5>'.trans('storefront::panel.banner'). ' 2</h5><hr/>',
                                'visible' => 'ce',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_3_banner_2_image]',
                                'display' => 'image',
                                'type'    => 'image',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_3_banner_2_caption_1]',
                                'display' => 'caption_2',
                                'type'    => 'text',
                                'col'     => 'col-6',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_3_banner_2_caption_2]',
                                'display' => 'caption_2',
                                'type'    => 'text',
                                'col'     => 'col-6',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'translatable[storefront_banner_section_3_banner_2_call_to_action_text]',
                                'display' => 'call_to_action_text',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_banner_section_3_banner_2_call_to_action_url',
                                'display' => 'call_to_action_url',
                                'type'    => 'text',
                                'col'     => 'col-4',
                                'visible' => 'ice',
                            ],
                            [
                                'name'    => 'storefront_banner_section_3_banner_2_open_in_new_window',
                                'display' => 'open_in_new_window',
                                'type'    => 'select',
                                'data'    => ['1' => 'Yes', '0' => 'No'],
                                'col'     => 'col-4',
                                'visible' => 'ice',
                            ]
                        ]
                    ],
                    [
                        'name'    => 'product_tabs',
                        'type'    => 'tab',
                        'visible' => 'ce',
                        'fields'  => [
                            [
                                'name'    => 'storefront_product_tabs_section_enabled',
                                'display' => 'section_status',
                                'type'    => 'select',
                                'data'    => ['1' => 'Enable', '0' => 'Disable'],
                                'visible' => 'e',
                            ],
                            [
                                'name'    => 'tab_1',
                                'type'    => 'blank',
                                'value'   => '<h5>' . trans('storefront::panel.tab') . ' 1</h5>',
                                'visible' => 'e'
                            ],
                            [
                                'name'    => 'translatable[storefront_product_tabs_section_tab_1_title]',
                                'display' => 'column_title',
                                'type'    => 'text',
                                'visible' => 'e',
                            ],
                            [
                                'name'     => 'storefront_product_tabs_section_tab_1_products',
                                'display'  => 'products',
                                'type'     => 'select',
                                'data'     => Product::all()->pluck('name', 'id'),
                                'multiple' => true,
                                'visible'  => 'ce',
                            ],
                            [
                                'name'    => 'tab_2',
                                'type'    => 'blank',
                                'value'   => '<h5>' . trans('storefront::panel.tab') . ' 2</h5>',
                                'visible' => 'e'
                            ],
                            [
                                'name'    => 'translatable[storefront_product_tabs_section_tab_2_title]',
                                'display' => 'column_title',
                                'type'    => 'text',
                                'visible' => 'e',
                            ],
                            [
                                'name'     => 'storefront_product_tabs_section_tab_2_products',
                                'display'  => 'products',
                                'type'     => 'select',
                                'data'     => Product::all()->pluck('name', 'id'),
                                'multiple' => true,
                                'visible'  => 'ce',
                            ],
                            [
                                'name'    => 'tab_3',
                                'type'    => 'blank',
                                'value'   => '<h5>' . trans('storefront::panel.tab') . ' 3</h5>',
                                'visible' => 'e'
                            ],
                            [
                                'name'    => 'translatable[storefront_product_tabs_section_tab_3_title]',
                                'display' => 'column_title',
                                'type'    => 'text',
                                'visible' => 'e',
                            ],
                            [
                                'name'     => 'storefront_product_tabs_section_tab_3_products',
                                'display'  => 'products',
                                'type'     => 'select',
                                'data'     => Product::all()->pluck('name', 'id'),
                                'multiple' => true,
                                'visible'  => 'ce',
                            ],
                            [
                                'name'    => 'tab_4',
                                'type'    => 'blank',
                                'value'   => '<h5>' . trans('storefront::panel.tab') . ' 4</h5>',
                                'visible' => 'e'
                            ],
                            [
                                'name'    => 'translatable[storefront_product_tabs_section_tab_4_title]',
                                'display' => 'column_title',
                                'type'    => 'text',
                                'visible' => 'e',
                            ],
                            [
                                'name'     => 'storefront_product_tabs_section_tab_4_products',
                                'display'  => 'products',
                                'type'     => 'select',
                                'data'     => Product::all()->pluck('name', 'id'),
                                'multiple' => true,
                                'visible'  => 'ce',
                            ],

                        ]
                    ],
                    [
                        'name'    => 'two_column_product_carousel',
                        'type'    => 'tab',
                        'visible' => 'ce',
                        'fields'  => [
                            [
                                'name'    => 'storefront_two_column_product_carousel_section_enabled',
                                'display' => 'section_status',
                                'type'    => 'select',
                                'data'    => ['1' => 'Enable', '0' => 'Disable'],
                                'visible' => 'e',
                            ],
                            [
                                'name'    => 'column_1',
                                'type'    => 'blank',
                                'value'   => '<h5>'.trans('storefront::panel.column'). ' 1</h5><hr/>',
                                'visible' => 'e'
                            ],
                            [
                                'name'    => 'translatable[storefront_two_column_product_carousel_section_column_1_title]',
                                'display' => 'column_title',
                                'type'    => 'text',
                                'visible' => 'e',
                            ],
                            [
                                'name'     => 'storefront_two_column_product_carousel_section_column_1_products',
                                'display'  => 'products',
                                'type'     => 'select',
                                'data'     => Product::all()->pluck('name', 'id'),
                                'multiple' => true,
                                'visible'  => 'ce',
                            ],
                            [
                                'name'    => 'column_2',
                                'type'    => 'blank',
                                'value'   => '<h5>'.trans('storefront::panel.column'). ' 2</h5><hr/>',
                                'visible' => 'e'
                            ],
                            [
                                'name'    => 'translatable[storefront_two_column_product_carousel_section_column_2_title]',
                                'display' => 'column_title',
                                'type'    => 'text',
                                'visible' => 'e',
                            ],
                            [
                                'name'     => 'storefront_two_column_product_carousel_section_column_2_products',
                                'display'  => 'products',
                                'type'     => 'select',
                                'data'     => Product::all()->pluck('name', 'id'),
                                'multiple' => true,
                                'visible'  => 'ce',
                            ]


                        ]
                    ],


                ]
            ]

        ];

        return $fields;
    }


    //functions /////////////////////////////////////////////////

    private function autoRefreshScript()
    {
        return '
            $("#auto_refresh_currency_rate_frequency").parents(".form-group").addClass("d-none");
            $("#auto_refresh_currency_rates").on("change", function() {
                console.log(this.value);
                if(this.value == "true"){
                    $("#auto_refresh_currency_rate_frequency").parents(".form-group").removeClass("d-none");
                } else {
                    $("#auto_refresh_currency_rate_frequency").parents(".form-group").addClass("d-none");
                }
            });
        ';

    }

    /**
     * Get all settings with cache support.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function allCached()
    {
        return Cache::tags(['settings'])->rememberForever('settings.all:' . Crud::locale(), function () {
            return self::all()->mapWithKeys(function ($setting) {
                return [$setting->key => $setting->value];
            });
        });
    }


    /**
     * Get setting for the given key.
     *
     * @param string $key
     * @param mixed $default
     * @return string|array
     */
    public static function get($key, $default = null)
    {
        return static::where('key', $key)->first()->value() ?? $default;
    }

    /**
     * Set the given settings.
     *
     * @param array $settings
     * @return void
     */
    public static function setMany($settings)
    {
        foreach ($settings as $key => $value) {
            self::set($key, $value);
        }
    }

    /**
     * Set the given setting.
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public static function set($key, $value)
    {
        if ($key === 'translatable') {
            return static::setTranslatableSettings($value);
        }
        static::updateOrCreate(['key' => $key], ['plain_value' => $value]);
    }

    /**
     * Set a translatable settings.
     *
     * @param array $settings
     * @return void
     */
    public static function setTranslatableSettings($settings = [])
    {
        foreach ($settings as $key => $value) {
            static::updateOrCreate(['key' => $key], [
                'is_translatable' => true,
                'value'           => $value,
            ]);
        }
    }

    //Mutators ////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Get the value of the setting.
     *
     * @return mixed
     */
    public function getValueAttribute()
    {
        if ($this->is_translatable) {
            return $this->translateOrDefault(Crud::locale())->value ?? null;
        }

        return $this->plain_value;
    }


}
