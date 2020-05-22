<?php

namespace Tir\Storefront\Http\Controllers;

use Illuminate\Routing\Controller;
use Tir\Setting\Facades\Stg;
use Tir\Store\Product\Entities\Product;

class ProductQuickViewController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $product = Product::findBySlug($slug);

        if (Stg::get('reviews_enabled')) {
            $product->load('reviews:product_id,rating');
        }


        return view(config('crud.front-template').'::public.products.quick_view.show', compact('product'));
    }
}
