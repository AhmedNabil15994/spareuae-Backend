<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'brands'], function () {
    Route::get('/', 'BrandController@index')
        ->name('dashboard.brands.index');

    Route::get('datatable', 'BrandController@datatable')
        ->name('dashboard.brands.datatable');

    Route::get('create', 'BrandController@create')
        ->name('dashboard.brands.create');

    Route::post('/', 'BrandController@store')
        ->name('dashboard.brands.store');

    Route::get('{id}/edit', 'BrandController@edit')
        ->name('dashboard.brands.edit');

    Route::put('{id}', 'BrandController@update')
        ->name('dashboard.brands.update');

    Route::delete('{id}', 'BrandController@destroy')
        ->name('dashboard.brands.destroy');

    Route::get('deletes', 'BrandController@deletes')
        ->name('dashboard.brands.deletes');

    Route::get('{id}', 'BrandController@show')
        ->name('dashboard.brands.show');
});
