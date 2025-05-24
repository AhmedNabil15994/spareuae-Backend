<?php

Route::group(['prefix' => 'garages'], function () {
    Route::get('/', 'GarageController@garages');
});
