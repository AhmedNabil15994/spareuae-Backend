<?php



Route::get('/',"HomeController@index")->name("frontend.home");

// contact us
Route::get('/contactUs', 'HomeController@contactUs')->name('frontend.contact_us');
Route::post('/contactUs', 'HomeController@sendContactUs')->name('frontend.send-contact-us');

Route::get('/car-shows', 'ShowsController@index')->name('frontend.car_shows');
Route::get('/car-shows/{slug}', 'ShowsController@show')->name('frontend.show_details');

Route::post('/subscribeToNews', 'HomeController@subscribeToNews')->name('frontend.subscribeToNews');

Route::get("/pricing", "HomeController@pricing")->name("frontend.ads.pricing");

Route::get("/options/getById", "HomeController@getById")->name("frontend.options.getById");

