<?php

use Illuminate\Support\Facades\Route;

Route::name('dashboard.')->group(function () {
    Route::get('customers/datatable', 'CustomerController@datatable')
        ->name('customers.datatable');

    Route::get('customers/deletes', 'CustomerController@deletes')
        ->name('customers.deletes');

    Route::resource('customers', 'CustomerController')->names('customers');
});
