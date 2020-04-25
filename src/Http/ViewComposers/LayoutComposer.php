<?php

namespace Tir\Storefront\Http\ViewComposers;

//use Modules\Compare\Compare;
//use Modules\Cart\Facades\Cart;
//use Modules\Menu\Entities\Menu;
//use Modules\Media\Entities\File;
//use Illuminate\Support\Facades\DB;
//use Modules\Menu\MegaMenu\MegaMenu;
//use Illuminate\Support\Facades\Cache;
//use Modules\Category\Entities\Category;

class LayoutComposer
{
    /**
     * Bind data to the view.
     *
     * @param \Illuminate\View\View $view
     * @return void
     */
    public function compose($view)
    {
        $view->with([

            'favicon' => null,
            'theme' => 'theme-blue',

        ]);

//        $view->with([
//            'theme' => $this->getTheme(),
//            'compareCount' => resolve(Compare::class)->count(),
//            'favicon' => $this->getFavicon(),
//            'headerLogo' => $this->getHeaderLogo(),
//            'categories' => $this->getCategories(),
//            'primaryMenu' => $this->getPrimaryMenu(),
//            'categoryMenu' => $this->getCategoryMenu(),
//            'cart' => $this->getCart(),
//            'shouldExpandCategoryMenu' => $this->getShouldExpandCategoryMenu(),
//            'brands' => $this->getBrands(),
//            'footerLogo' => $this->getFooterLogo(),
//            'footerMenu' => $this->getFooterMenu(),
//            'socialLinks' => $this->getSocialLinks(),
//            'copyrightText' => $this->getCopyrightText(),
//        ]);
    }

    private function getTheme()
    {
        return Stg::get('storefront_theme', 'theme-blue');
    }

    private function getFavicon()
    {
        return $this->getLogo('storefront_favicon');
    }

    private function getHeaderLogo()
    {
        return $this->getLogo('storefront_header_logo');
    }

    private function getLogo($key)
    {
        return File::findOrNew(Stg::get($key))->path;
    }

    private function getCategories()
    {
        return Category::searchable();
    }

    private function getPrimaryMenu()
    {
        return new MegaMenu(Stg::get('storefront_primary_menu'));
    }

    private function getCategoryMenu()
    {
        return new MegaMenu(Stg::get('storefront_category_menu'));
    }

    private function getCart()
    {
        return Cart::instance();
    }

    private function getShouldExpandCategoryMenu()
    {
        $layout = storefront_layout();

        if ($layout === 'default') {
            return request()->routeIs('home');
        }

        if ($layout === 'slider_with_banners') {
            return false;
        }

        return true;
    }

    private function getBrands()
    {
        $brands = Stg::get('storefront_brands', []);

        return Cache::tags('settings')->rememberForever('storefront_brands.' . serialize($brands), function () use ($brands) {
            return File::whereIn('id', $brands)
                ->when(! empty($brands), function ($query) use ($brands) {
                    $query->orderBy(DB::raw('FIELD(`id`, ' . implode(',', $brands) . ')'));
                })
                ->get();
        });
    }

    private function getFooterLogo()
    {
        return $this->getLogo('storefront_footer_logo');
    }

    private function getFooterMenu()
    {
        $menuId = Stg::get('storefront_footer_menu');

        return Cache::tags(['menu_items', 'categories', 'pages', 'settings'])
            ->rememberForever("storefront_footer_menu.{$menuId}:" . locale(), function () use ($menuId) {
                return Menu::for($menuId);
            });
    }

    private function getSocialLinks()
    {
        return collect([
            'facebook-official' => Stg::get('storefront_fb_link'),
            'twitter' => Stg::get('storefront_twitter_link'),
            'instagram' => Stg::get('storefront_instagram_link'),
            'linkedin' => Stg::get('storefront_linkedin_link'),
            'pinterest' => Stg::get('storefront_pinterest_link'),
            'google-plus' => Stg::get('storefront_google_plus_link'),
            'youtube' => Stg::get('storefront_youtube_link'),
        ])->reject(function ($link) {
            return is_null($link);
        });
    }

    private function getCopyrightText()
    {
        $replacements = [
            'store_url' => route('home'),
            'store_name' => Stg::get('store_name'),
            'year' => date('Y'),
        ];

        $copyrightText = Stg::get('storefront_copyright_text');

        foreach ($replacements as $key => $replacement) {
            $copyrightText = str_replace("{{ $key }}", $replacement, $copyrightText);
        }

        return $copyrightText;
    }
}
