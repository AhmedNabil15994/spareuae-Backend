<?php
// ===================users=======================
Route::group(['prefix' => 'user', 'middleware' => 'auth:api'], function () {
    Route::get('profile', 'UserController@profile')->name('api.users.profile');
    Route::post('profile', 'UserController@updateProfile')->name('api.users.profile');
    // Route::post('office', 'UserController@updateOrCreateOffice')->name('api.users.profile');
    Route::post('reset-password', 'UserController@resetPassword')->name('api.users.resetPassword');
    Route::post("setting", "UserController@updateSetting");
    Route::post("test-fcm", "UserController@testFcm");
    Route::get("notifcations", "UserController@notifications");
});


Route::group(
    ["prefix" => "user"],
    function () {
        Route::post("/rates", "UserController@rate")->middleware("auth:api");
        Route::get("/{id}/current-rate", "UserController@getRate");
    }
);

Route::post('/user/get-verified', 'UserController@getVerifidCode');

Route::get("socials/list", "SocialsController@index");
