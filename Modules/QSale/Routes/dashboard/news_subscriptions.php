<?php

Route::group(['prefix' => 'news_subscriptions'], function () {

    Route::get('/' ,'SubscriptionNewsController@index')
        ->name('dashboard.news_subscriptions.index');

    Route::delete('{id}'	,'SubscriptionNewsController@destroy')
        ->name('dashboard.news_subscriptions.destroy');

    Route::get('deletes'	,'SubscriptionNewsController@deletes')
        ->name('dashboard.news_subscriptions.deletes');

    Route::get('datatable'	,'SubscriptionNewsController@datatable')
        ->name('dashboard.news_subscriptions.datatable');

});
