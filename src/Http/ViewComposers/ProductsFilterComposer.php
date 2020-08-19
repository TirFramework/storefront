<?php

namespace Tir\Storefront\Http\ViewComposers;

use Illuminate\Support\Facades\DB;
use Tir\Store\Attribute\Entities\ProductAttribute;
use Tir\Store\Attribute\Entities\ProductAttributeValue;
use Tir\Store\Brand\Entities\Brand;
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
            'brands' => $this->brands()
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


        $categorySlug = request('category');




        if (isset($categorySlug)) {

            $productAttributeIds =  ProductAttribute::whereIn('product_id', $view['productIds'])->pluck('id');
            $valueIds = ProductAttributeValue::whereIn('product_attribute_id', $productAttributeIds)->distinct()->pluck('attribute_value_id');
            $filters = Attribute::with(['values' =>function($query) use ($valueIds){
                $query->whereIn('id', $valueIds);
            }])
                ->where('is_filterable', true)
                ->whereHas('categories', function ($query) use ($categorySlug) {
                    $query->where('id', $this->getCategoryId($categorySlug));
                })
                ->orderBy('position')->get();
        }

        return $filters;


         $filters = Attribute::with('values')
            ->where('is_filterable', true)
            ->whereHas('categories', function ($query) use ($view) {
                $query->whereIn('id', $this->getProductsCategoryIds($view));
            })->orderBy('position')
            ->get();




        return $filters;


        return [];






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

    private function brands()
    {
        $categorySlug = request('category');
        return  Brand::whereHas('products',function($query) use($categorySlug){
            $query->whereHas('categories',function($q) use($categorySlug){
                $q->where('slug', $categorySlug);
            });
        })->orderBy('position')->get();
    }
}
