<?php


// Add web middleware for use Laravel feature
Route::group(['middleware' => 'web'], function () {

    //add admin prefix and middleware for admin area to user module
    Route::group(['prefix' => 'admin', 'middleware' => 'IsAdmin'], function () {
        // Route::resource('/setting', 'Tir\Setting\Controllers\AdminSettingController');
        Route::get('/storefront', 'Tir\Storefront\Http\Controllers\AdminStorefrontController@editSetting')->name('storefront.edit');
        Route::get('/storefront', 'Tir\Storefront\Http\Controllers\AdminStorefrontController@editSetting')->name('storefront.index');
        Route::put('/storefront', 'Tir\Storefront\Http\Controllers\AdminStorefrontController@updateSetting')->name('storefront.update');
    });

});