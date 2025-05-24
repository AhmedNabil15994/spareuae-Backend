<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'garages'], function () {
    Route::get('/', 'GarageController@index')
        ->name('dashboard.garages.index');

    Route::get('datatable', 'GarageController@datatable')
        ->name('dashboard.garages.datatable');

    Route::get('create', 'GarageController@create')
        ->name('dashboard.garages.create');

    Route::post('/', 'GarageController@store')
        ->name('dashboard.garages.store');

    Route::get('{id}/edit', 'GarageController@edit')
        ->name('dashboard.garages.edit');

    Route::put('{id}', 'GarageController@update')
        ->name('dashboard.garages.update');

    Route::delete('{id}', 'GarageController@destroy')
        ->name('dashboard.garages.destroy');

    Route::get('deletes', 'GarageController@deletes')
        ->name('dashboard.garages.deletes');

    Route::get('{id}', 'GarageController@show')
        ->name('dashboard.garages.show');
});
