<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'brands'], function () {
    Route::get('/', 'BrandController@index')
        ->name('frontend.brands.index');
    Route::get('/{id}', 'BrandController@show')
        ->name('frontend.brands.show');
});
