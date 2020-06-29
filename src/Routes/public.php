<?php

// Add web middleware for use Laravel feature
Route::group(['middleware' => 'web'], function () {

//    Route::post('cookie-bar', 'CookieBarController@accepted')->name('cookie_bar.accepted');
    Route::get('products/{slug}/quick-view', 'Tir\Storefront\Http\Controllers\ProductQuickViewController@show')->name('products.quick_view.show');

});

