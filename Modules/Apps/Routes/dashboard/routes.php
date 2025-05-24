<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => '/', 'middleware' => ['dashboard.auth', 'permission:dashboard_access']], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.home');
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});

// ================================ contact us ===========================

Route::group(['prefix' => 'contacts'], function () {
    Route::get('/', 'ContactController@index')
        ->name('dashboard.contact.index')
        ->middleware(['permission:show_contact']);

    Route::get('datatable', 'ContactController@datatable')
        ->name('dashboard.contact.datatable')
        ->middleware(['permission:show_contact']);
    Route::delete('{id}', 'ContactController@destroy')
        ->name('dashboard.contact.destroy')
        ->middleware(['permission:delete_contact']);

    Route::get('deletes', 'ContactController@deletes')
        ->name('dashboard.contact.deletes')
        ->middleware(['permission:delete_contact']);
});
Route::group(['prefix' => 'donations'], function () {
    Route::get('/', 'DonationController@index')
        ->name('dashboard.donations.index')
        ->middleware(['permission:show_donations']);

    Route::get('datatable', 'DonationController@datatable')
        ->name('dashboard.donations.datatable')
        ->middleware(['permission:show_donations']);



    Route::delete('{id}', 'DonationController@destroy')
        ->name('dashboard.donations.destroy')
        ->middleware(['permission:delete_donations']);

    Route::get('deletes', 'DonationController@deletes')
        ->name('dashboard.donations.deletes')
        ->middleware(['permission:delete_donations']);
});
