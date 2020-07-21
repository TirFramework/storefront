<?php

namespace Tir\Storefront;


use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Tir\Storefront\Http\ViewComposers\HomePageComposer;
use Tir\Storefront\Http\ViewComposers\LayoutComposer;
use Tir\Storefront\Http\ViewComposers\ProductsFilterComposer;

class StorefrontServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
        View::composer('storefront::public.home.index', HomePageComposer::class);
        View::composer('storefront::public.layout', LayoutComposer::class);
        View::composer('storefront::public.products.partials.filter', ProductsFilterComposer::class);


        $this->loadRoutesFrom(__DIR__.'/Routes/admin.php');
        $this->loadRoutesFrom(__DIR__.'/Routes/public.php');


//        $this->loadMigrationsFrom(__DIR__ .'/Database/Migrations');

        $this->loadViewsFrom(__DIR__.'/Resources/Views', 'storefront');

        $this->loadTranslationsFrom(__DIR__.'/Resources/Lang/', 'storefront');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->adminMenu();
    }

    private function adminMenu()
    {
        $menu = resolve('AdminMenu');
        $menu->item('setting')->title('storefront::panel.setting')->link('#')->add();
        $menu->item('setting.storefront_setting')->title('storefront::panel.storefront_setting')->link('./admin/storefront')->add();



    }
}
