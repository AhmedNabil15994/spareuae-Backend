<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'garages'], function () {
    Route::get('/', 'GarageController@index')
        ->name('frontend.garages.index');
    Route::get('/create', 'GarageController@create')
        ->name('frontend.garages.create');

    Route::post('/', 'GarageController@store')
        ->name('frontend.garages.store');
    Route::get('/{garage}', 'GarageController@show')
        ->name('frontend.garages.show');
});
