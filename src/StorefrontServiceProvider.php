<?php

namespace Tir\Storefront;


use Illuminate\Support\ServiceProvider;


class StorefrontServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

//        $this->loadRoutesFrom(__DIR__.'/Routes/admin.php');


//        $this->loadMigrationsFrom(__DIR__ .'/Database/Migrations');

        $this->loadViewsFrom(__DIR__.'/Resources/Views', 'storefront');

//        $this->loadTranslationsFrom(__DIR__.'/Resources/Lang/', 'menu');

    }
}
