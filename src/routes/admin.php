<?php


// Add web middleware for use Laravel feature
Route::group(['middleware' => 'web'], function () {

    //add admin prefix and middleware for admin area to user module
    Route::group(['prefix' => 'admin', 'middleware' => 'IsAdmin'], function () {
        // Route::resource('/setting', 'Tir\Setting\Controllers\AdminSettingController');
        Route::get('/storefront', 'Tir\Storefront\Http\Controllers\AdminStorefrontController@editSetting')->name('storefrontSetting.edit');
        Route::get('/storefront', 'Tir\Storefront\Http\Controllers\AdminStorefrontController@editSetting')->name('storefrontSetting.index');
        Route::put('/storefront', 'Tir\Storefront\Http\Controllers\AdminStorefrontController@updateSetting')->name('storefrontSetting.update');
    });

});