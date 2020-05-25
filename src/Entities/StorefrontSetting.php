<?php

namespace Tir\Storefront\Entities;

use Illuminate\Support\Facades\Cache;
use Tir\Crud\Support\Eloquent\CrudModel;
use Tir\Crud\Support\Eloquent\Translatable;
use Tir\Crud\Support\Facades\Crud;
use Tir\Menu\Entities\Menu;
use Tir\Page\Entities\Page;
use Tir\Slider\Entities\Slider;

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

    public  $table = 'settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['key', 'is_translatable', 'plain_value','module'];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_translatable' => 'boolean',
        'plain_value' => 'array'

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
            'key' => 'required',
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
                'name' => 'basic_setting',
                'type' => 'group',
                'visible'    => 'ce',
                'tabs'=>  [
                    [
                        'name'  => 'general_setting',
                        'type'  => 'tab',
                        'visible'    => 'ce',
                        'fields' => [
                            [
                                'name'       => 'id',
                                'type'       => 'text',
                                'visible'    => 'io',
                            ],
                            [
                                'name'      => 'storefront_theme',
                                'type'      => 'select',
                                'data'      =>  ['blue'=>'Blue','red'=>'red'],
                                'visible'   => 'ice',
                            ],
                            [
                                'name'      => 'storefront_mail_theme',
                                'type'      => 'select',
                                'data'      =>  ['blue'=>'Blue','red'=>'red'],
                                'visible'   => 'ice',
                            ],
                            [
                                'name'      => 'storefront_layout',
                                'type'      => 'select',
                                'data'      => ['default'=>'Default', 'slider_with_banner'=>'Slider With Banner'],
                                'visible'   => 'ice',
                            ],
                            [
                                'name'      => 'translatable[storefront_slider]',
                                'type'      => 'select',
                                'data'      => Slider::select('*')->get()->pluck('name','id'),
                                'visible'   => 'ice',
                            ],
                            [
                                'name'      => 'storefront_terms_page',
                                'type'      => 'select',
                                'data'      => Page::select('*')->get()->pluck('title','id'),
                                'visible'   => 'ice',
                            ],
                            [
                                'name'      => 'storefront_privacy_page',
                                'type'      => 'select',
                                'data'      => Page::select('*')->get()->pluck('title','id'),
                                'visible'   => 'ice',
                            ],
                            [
                                'name'      => 'translatable[storefront_footer_address]',
                                'type'      => 'text',
                                'visible'   => 'ice',
                            ],
                            [
                                'name'      => 'translatable[storefront_copyright_text]',
                                'type'      => 'text',
                                'visible'   => 'ice',
                            ],
                            

                        ]
                    ],
                    [
                        'name'  => 'logo',
                        'type'  => 'tab',
                        'visible'    => 'ce',
                        'fields' => [
                            
                            [
                                'name'      => 'storefront_favicon',
                                'type'      => 'image',
                                'visible'   => 'ce',
                            ],
                            [
                                'name'      => 'translatable[storefront_header_logo]',
                                'type'      => 'image',
                                'visible'   => 'ce',
                            ],
                            [
                                'name'      => 'translatable[storefront_footer_logo]',
                                'type'      => 'image',
                                'visible'   => 'ce',
                            ],
                            [
                                'name'      => 'translatable[storefront_mail_logo]',
                                'type'      => 'image',
                                'visible'   => 'ce',
                            ],

                        ]
                    ],
                    [
                        'name'  => 'menu',
                        'type'  => 'tab',
                        'visible'    => 'ce',
                        'fields' => [

                            [
                                'name'      => 'translatable[storefront_primary_menu]',
                                'type'      => 'select',
                                'data'      => Menu::select('*')->get()->pluck('name','id'),
                                'visible'   => 'ce',
                            ],
                            [
                                'name'      => 'translatable[storefront_category_menu]',
                                'type'      => 'select',
                                'data'      => Menu::select('*')->get()->pluck('name','id'),
                                'visible'   => 'ce',
                            ]
                        ]
                    ]
                ]

                


            ]

        ];

        return json_decode(json_encode($fields));
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
                'value' => $value,
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
