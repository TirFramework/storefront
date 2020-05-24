<?php

namespace Tir\Storefront\Http\Controllers;

use Tir\Setting\Controllers\AdminSettingController;
use Tir\Storefront\Entities\StorefrontSetting;


class AdminStorefrontController extends AdminSettingController
{
    protected $model = StorefrontSetting::Class;
    protected $module = 'storefront';
}

