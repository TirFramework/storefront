<?php

namespace Tir\Storefront\Http\ViewComposers;

use Illuminate\Support\Facades\DB;
use Tir\Store\Product\Entities\Product;
use Tir\Store\Category\Entities\Category;
use Tir\Store\Attribute\Entities\Attribute;

class ProductsFilterComposer
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
            'categories' => $this->categories(),
            'attributes' => $this->attributes($view),
            'maxPrice' => $this->maxPrice(),
        ]);
    }

    private function categories()
    {
        return Category::tree();
    }

    private function attributes($view)
    {
        if ($this->filteringViaRootCategory()) {
            return [];
        }


        if(isset($categorySlug)){
            return Attribute::with('values')
                ->where('is_filterable', true)
                ->whereHas('categories', function ($query) use ($view) {
                    $query->where('id', $this->getCategoryId($categorySlug));
                })->get();

        }
        return [];


        //Original code
        /*          return Attribute::with('values')
                    ->where('is_filterable', true)
                    ->whereHas('categories', function ($query) use ($view) {
                        $query->whereIn('id', $this->getProductsCategoryIds($view));
                    })
                    ->get();
            }*/
    }

    public static function filteringViaRootCategory()
    {
        return Category::whereTranslation('name', request('category'))
            ->firstOrNew([])
            ->isRoot();
    }

    private function getCategoryId($categorySlug)
    {
        return Category::select('id','slug')->where('slug',$categorySlug)->first()->id;

    }

    private function getProductsCategoryIds($view)
    {
        return DB::table('product_category')
            ->whereIn('product_id', $view['productIds'])
            ->distinct()
            ->pluck('category_id');
    }

    private function maxPrice()
    {
        return Product::max('selling_price');
    }
}
