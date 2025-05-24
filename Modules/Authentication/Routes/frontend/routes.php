<?php

use Illuminate\Support\Facades\Route;

// reset password
Route::group(['prefix' => 'reset'], function ($router) {

    // Show Forget Password Form
    Route::get('{token}', 'ResetPasswordController@resetPassword')
        ->name('frontend.password.reset');
    // ->middleware('guest');

    // Send Forget Password Via Mail
    Route::post('/', 'ResetPasswordController@updatePassword')
        ->name('frontend.password.update');
});

Route::group(['prefix' => 'register'], function ($routerLogin) {
    // Show Login Form
    $routerLogin->get('/', 'RegisterController@showRegister')
        ->name('frontend.register')
        ->middleware('guest');

    // Submit Login
    $routerLogin->post('/', 'LoginController@postLogin')
        ->name('frontend.post_login');
});

// login
Route::group(['prefix' => 'login'], function ($routerLogin) {
    // Show Login Form
    $routerLogin->get('/', 'LoginController@showLogin')
        ->name('frontend.login')
        ->middleware('guest');

    // Submit Login
    $routerLogin->post('/', 'LoginController@postLogin')
        ->name('frontend.post_login');
});

Route::group(['prefix' => 'forget'], function ($routerLogin) {
    // Show Login Form
    $routerLogin->get('/', 'ResetPasswordController@resetUsingMobile')
        ->name('frontend.forget')
        ->middleware('guest');

    // Submit Login
//    $routerLogin->post('/', 'ResetPasswordController@resetUsingMobileSave')
//        ->name('frontend.post_forget');

    $routerLogin->post('/', 'ResetPasswordController@postResetUsingMobileSave')
        ->name('frontend.post_reset_form');

});



//logout
Route::group(['prefix' => 'logout', 'middleware' => 'auth'], function () {
    // Logout
    Route::any('/', 'LoginController@logout')
        ->name('frontend.logout');
});



Route::group(['prefix' => 'register'], function () {




    // Submit Register
    Route::post('/', 'RegisterController@register')
        ->name('frontend.register');
});
