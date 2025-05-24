<?php

Route::group(['prefix' => 'brands'], function () {
    Route::get('/', 'BrandController@brands');
});
