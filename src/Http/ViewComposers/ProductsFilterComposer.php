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
    private $categorySlug;
    public function compose($view)
    {
        $view->with([
            'categories' => $this->categories(),
            'attributes' => $this->attributes($view),
            'maxPrice' => $this->maxPrice($view),
            'brands' => $this->brands($view)
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


        $this->categorySlug = request('category');
        $productAttributeIds =  ProductAttribute::whereIn('product_id', $this->getProductIds($view))->pluck('id');
        $valueIds = ProductAttributeValue::whereIn('product_attribute_id', $productAttributeIds)->distinct()->pluck('attribute_value_id');

        $filters = Attribute::with(['values' =>function($query) use ($valueIds){
            $query->whereIn('id', $valueIds);
        }])
            ->where('is_filterable', true)
            ->whereHas('categories', function ($query) use ($view) {
                if(isset($this->categorySlug)){
                    $query->where('id', $this->getCategoryId());
                }else{
                    $query->whereIn('id', $this->getProductsCategoryIds($view));
                }
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

    private function getCategoryId()
    {
        return Category::select('id','slug')->where('slug',$this->categorySlug)->first()->id;

    }

    private function getProductIds($view){
        $productIds = [];
        if(count($view['productIds']) > 0){
            $productIds = $view['productIds'];
        }else{
            $categorySlug = request('category');
            if (isset($categorySlug)) {
                $productIds =  Category::select('id','slug')->where('slug',$categorySlug)->first()->products()->pluck('id');

            }
        }

        return $productIds;
    }

    private function getProductsCategoryIds($view)
    {
        return DB::table('product_category')
            ->whereIn('product_id', $view['productIds'])
            ->distinct()
            ->pluck('category_id');
    }

    private function maxPrice($view)
    {
        if(request('category'))
        {
            return Category::select('id','slug')->where('slug',request('category'))->first()->products()->max('selling_price');

        }
        return Product::whereIn('id',$view['productIds'])
            ->where('call_for_price',0)
            ->max('selling_price');
    }

    private function brands($view)
    {
        return  Brand::whereHas('products',function($query) use($view){
            $query->whereIn('id', $view['productIds']);
        })->orderBy('position')->get();
    }
}
