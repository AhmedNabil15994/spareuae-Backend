<?php

Route::group(['prefix' => 'customers','as'=>'frontend.customers.'], function () {
    Route::get('', 'CustomerController@index')->name('index');
});

