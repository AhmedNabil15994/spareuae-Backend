<?php

use Illuminate\Support\Facades\Route;

Route::post('/frontend/comments/store/{id}', 'CommentsController@comment')->name('frontend.comments.store');
