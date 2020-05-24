<?php

namespace Tir\Setting\Entities;

use Tir\Crud\Support\Eloquent\TranslationModel;


class StorefrontSettingTranslation extends TranslationModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['value'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

}
