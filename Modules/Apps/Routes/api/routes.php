<?php

use Illuminate\Support\Facades\Route;

Route::post('contact-us', 'ContactUsController@send')->name('api.contactus.send');
Route::post('donations', 'DonationController@store')->middleware(['auth:api']);
