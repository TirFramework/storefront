<?php

namespace Tir\Storefront\Http\ViewComposers;

use Illuminate\Support\Collection;
use Tir\Setting\Facades\Stg;
use Tir\Slider\Entities\Slider;
use Tir\Store\Product\Entities\Product;
use Illuminate\Support\Facades\Cache;



class HomePageComposer
{
    /**
     * The recently viewed instance.
     *
     * @var \Modules\Product\RecentlyViewed
     */
    private $recentlyViewed;

    /**
     * Create a new instance.
     *
     * @param \Modules\Product\RecentlyViewed $recentlyViewed
     */
//    public function __construct(RecentlyViewed $recentlyViewed)
//    {
//        $this->recentlyViewed = $recentlyViewed;
//    }

    /**
     * Bind data to the view.
     *
     * @param \Illuminate\View\View $view
     * @return void
     */
    public function compose($view)
    {
        $view->with([
            'slider' => Slider::findWithSlides(Stg::get('storefront_slider')),
            'features' => $this->getFeatures(),
            'carouselProducts' => $this->getCarouselProducts(),
            'recentProducts' => $this->getRecentProducts(),


        ]);

/*        $view->with([
            //'slider' => Slider::findWithSlides(Stg::get('storefront_slider')),
            'sliderBanners' => Banner::allForSliderBanners(),
            'bannerSectionOneBanners' => $this->getBannerSectionOneBanners(),
            'features' => $this->getFeatures(),
            'carouselProducts' => $this->getCarouselProducts(),
            'recentProducts' => $this->getRecentProducts(),
            'bannerSectionTwoBanner' => $this->getBannerSectionTwoBanner(),
            'threeColumnCarouselProducts' => $this->getThreeColumnCarouselProducts(),
            'landscapeProducts' => $this->getLandscapeProducts(),
            'bannerSectionThreeBanners' => $this->getBannerSectionThreeBanners(),
            'tabProducts' => $this->getTabProducts(),
            'twoColumnCarouselProducts' => $this->getTwoColumnCarouselProducts(),
            'recentlyViewedProducts' => $this->getRecentlyViewedProducts(),
        ]);*/
    }

    private function getBannerSectionOneBanners()
    {
        if (Stg::get('storefront_banner_section_1_enabled')) {
            return Banner::allForSectionOne();
        }
    }

    private function getFeatures()
    {
        if (! Stg::get('storefront_features_section_enabled')) {
            return collect();
        }

        return Collection::times(4, function ($number) {
            return $this->getFeatureFor($number);
        })->filter(function ($feature) {
            return ! is_null($feature['icon']);
        });
    }

    private function getFeatureFor($number)
    {
        return [
            'icon' => Stg::get("storefront_feature_{$number}_icon"),
            'title' => Stg::get("storefront_feature_{$number}_title"),
            'subtitle' => Stg::get("storefront_feature_{$number}_subtitle"),
        ];
    }

    private function getRecentProducts()
    {
        if (! Stg::get('storefront_recent_products_section_enabled')) {
            return collect();
        }

        return Product::forCard()
            ->latest()
            ->take(Stg::get('storefront_recent_products_section_total_products', 10))
            ->get();
    }

    private function getBannerSectionTwoBanner()
    {
        if (Stg::get('storefront_banner_section_2_enabled')) {
            return Banner::findByName('storefront_banner_section_2_banner');
        }
    }

    private function getCarouselProducts()
    {
        if (! Stg::get('storefront_product_carousel_section_enabled')) {
            return collect();
        }

        return $this->getProductsForCardByIds(Stg::get('storefront_product_carousel_section_products'));
    }

    private function getBannerSectionThreeBanners()
    {
        if (Stg::get('storefront_banner_section_3_enabled')) {
            return Banner::allForSectionThree();
        }
    }

    private function getTabProducts()
    {
        if (! Stg::get('storefront_product_tabs_section_enabled')) {
            return collect();
        }

        return [
            'tab_1' => $this->getProductsForCardByIds(Stg::get('storefront_product_tabs_section_tab_1_products')),
            'tab_2' => $this->getProductsForCardByIds(Stg::get('storefront_product_tabs_section_tab_2_products')),
            'tab_3' => $this->getProductsForCardByIds(Stg::get('storefront_product_tabs_section_tab_3_products')),
            'tab_4' => $this->getProductsForCardByIds(Stg::get('storefront_product_tabs_section_tab_4_products')),
        ];
    }

    private function getThreeColumnCarouselProducts()
    {
        if (! Stg::get('storefront_three_column_vertical_product_carousel_section_enabled')) {
            return collect();
        }

        return [
            'column_1' => $this->getProductsForCardByIds(Stg::get('storefront_three_column_vertical_product_carousel_section_column_1_products')),
            'column_2' => $this->getProductsForCardByIds(Stg::get('storefront_three_column_vertical_product_carousel_section_column_2_products')),
            'column_3' => $this->getProductsForCardByIds(Stg::get('storefront_three_column_vertical_product_carousel_section_column_3_products')),
        ];
    }

    private function getLandscapeProducts()
    {
        if (! Stg::get('storefront_landscape_products_section_enabled')) {
            return collect();
        }

        return $this->getProductsForCardByIds(Stg::get('storefront_landscape_products_section_products'));
    }

    private function getTwoColumnCarouselProducts()
    {
        if (! Stg::get('storefront_two_column_product_carousel_section_enabled')) {
            return collect();
        }

        return [
            'column_1' => $this->getProductsForCardByIds(Stg::get('storefront_two_column_product_carousel_section_column_1_products')),
            'column_2' => $this->getProductsForCardByIds(Stg::get('storefront_two_column_product_carousel_section_column_2_products')),
        ];
    }

    private function getProductsForCardByIds($ids)
    {
        return Product::forCard()
            ->whereIn('id', $ids ?: [])
            ->get();
    }

    private function getRecentlyViewedProducts()
    {
        if (! Stg::get('storefront_recently_viewed_section_enabled')) {
            return collect();
        }

        return collect($this->recentlyViewed->products())
            ->reverse()
            ->take(Stg::get('storefront_recently_viewed_section_total_products', 5));
    }
}
